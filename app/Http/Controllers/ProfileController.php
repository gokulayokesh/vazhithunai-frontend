<?php
namespace App\Http\Controllers;

use App\Models\ProfileWatchHistory;
use App\Models\Shortlist;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function search(Request $request)
    {
        return view('layout.listings');
    }

    public function profile(Request $request)
    {
        try{
            $userId   = User::getIdByIdentifier($request->identifier);
            $viewerId = Auth::id();
            if ($userId == $viewerId) {
                return redirect()->route('myaccount');
            }

            $profile = UserDetails::with([
                'user',       // relation to users table
                'userImages', // relation to profile images
                'userHoroscopeImages',
            ])->where('user_id', $userId)->first();

            // Main profile (with relations to avoid N+1)
            $profiles = UserDetails::with(['user', 'userImages'])
            ->where('user_id', $userId)
            ->firstOrFail();

            // Check if this viewer has already viewed this profile
            $alreadyViewed = ProfileWatchHistory::where('viewer_id', $viewerId)
                ->where('profile_id', $profile->user_id)
                ->exists();

            // Build a simple "similar profiles" query (tune filters as needed)
            $similarProfiles = UserDetails::with(['user', 'userImages'])
                ->where('id', '!=', $profiles->id)
                ->when($profiles->gender, fn($q) => $q->where('gender', $profiles->gender)) // or opposite gender if desired
                ->when($profiles->state, fn($q) => $q->where('state', $profiles->state))
                ->when($profiles->caste, fn($q) => $q->where('caste', $profiles->caste))
                ->latest()
                ->limit(6)
                ->get();

            return view('layout.profile', compact('profile', 'similarProfiles', 'alreadyViewed'));
        }catch (\Exception $e) {
            \Log::error('ProfileController@profile error: '.$e->getMessage());
            return abort(404);
        }
    }

    public function toggleShortlist(Request $request, $shortlistedUserId)
    {
        if (! Auth::check()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Please log in to shortlist users',
            ], 401);
        }

        $userId = Auth::id();

        // Prevent self-shortlisting
        if ($userId == $shortlistedUserId) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You cannot shortlist yourself',
            ], 422);
        }

        // Check if already shortlisted
        $existing = Shortlist::where('user_id', $userId)
            ->where('shortlisted_user_id', $shortlistedUserId)
            ->first();

        if ($existing) {
            // Remove from shortlist
            $existing->delete();

            return response()->json([
                'status'  => 'removed',
                'message' => 'User removed from shortlist',
            ]);
        } else {
            // Add to shortlist
            $shortlist = Shortlist::create([
                'user_id'             => $userId,
                'shortlisted_user_id' => $shortlistedUserId,
            ]);

            return response()->json([
                'status'  => 'added',
                'message' => 'User added to shortlist',
                'data'    => $shortlist,
            ]);
        }
    }

    public function myaccount()
    {
        // Load JSON reference data
        $referenceData = json_decode(Storage::disk('public')->get('json/data.json'), true);


        $user = Auth::user()->load(['userDetails', 'userImages', 'shortlistedUsers']);

        return view('layout.account', compact('user', 'referenceData'));
    }

    public function viewProfile($id)
    {
        $profile = User::findOrFail($id);
        $viewer  = Auth::user();

        // Record watch history
        $history = ProfileWatchHistory::firstOrCreate(
            ['viewer_id' => $viewer->id, 'profile_id' => $profile->id],
            ['view_count' => 0]
        );

        $history->increment('view_count');

        // Decrement profile’s available view count
        if ($viewer->view_profile_count > 0) {
            $viewer->decrement('view_profile_count');
        }

        return redirect()->route('profile', $profile->identifier);
    }
}
