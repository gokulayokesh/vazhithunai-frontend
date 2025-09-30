<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'    => 'required|string|max:150',
                'mail_id' => 'required|email|max:191',
                'mobile'  => 'nullable|string|max:20',
                'subject' => 'nullable|string|max:200',
                'message' => 'required|string',
            ]);

            ContactMessage::create($validated);

            return response()->json([
                'status'  => 'success',
                'message' => 'Message sent successfully!',
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors in JSON
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong. Please try again later.',
                'debug'   => $e->getMessage(), // remove in production
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}
