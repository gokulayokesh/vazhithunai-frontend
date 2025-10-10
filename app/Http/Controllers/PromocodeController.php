<?php
namespace App\Http\Controllers;

use App\Models\Promocode;
use App\Models\PromocodeRedemption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class PromocodeController extends Controller
{

    public function index()
    {
        return view('layout.promocode');
    }

    public function apply(Request $request)
    {
        try{
            $request->validate([
                'code' => 'required|string',
            ]);
    
            $user = Auth::user();
    
            if (! $user->profile_completed) {
                return response()->json(['status' => 'error', 'message' => 'Complete your profile before applying a promocode.'], 403);
            }
    
            $promocode = Promocode::where('code', $request->code)->first();
    
            if (! $promocode) {
                return response()->json(['status' => 'error', 'message' => 'Invalid promocode.'], 404);
            }
    
            if ($promocode->expires_at && $promocode->expires_at->isPast()) {
                return response()->json(['status' => 'error', 'message' => 'This promocode has expired.'], 410);
            }
    
            if ($promocode->used_count >= $promocode->max_uses) {
                return response()->json(['status' => 'error', 'message' => 'This promocode has reached its usage limit.'], 429);
            }
    
            $alreadyUsed = PromocodeRedemption::where('user_id', $user->id)
                ->where('promocode_id', $promocode->id)
                ->exists();
    
            if ($alreadyUsed) {
                return response()->json(['status' => 'error', 'message' => 'You have already used this promocode.'], 409);
            }
    
            $user->view_profile_count = $user->view_profile_count+$promocode->plan->profile_view_count;
            $user->save();
    
            PromocodeRedemption::create([
                'user_id'      => $user->id,
                'promocode_id' => $promocode->id,
            ]);
    
            $promocode->increment('used_count');
    
            return response()->json(['status' => 'success', 'message' => 'Promocode applied! Your subscription is now active.']);
        }catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

}
