<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::first();
        return view('pages.admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'fax' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'latitude' => 'nullable|string|max:20',
            'longitude' => 'nullable|string|max:20',
            'social_media' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'telegram' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:50',
            'facebook' => 'nullable|string|max:50',
            'twitter' => 'nullable|string|max:50',
            'youtube' => 'nullable|string|max:50',
            'tiktok' => 'nullable|string|max:50',
        ]);

        try {
            $contact = Contact::first() ?? new Contact();
            $contact->fill($request->all());
            $contact->user_id = auth()->id();
            $contact->save();

            return redirect()->route('contact.index')->with('success', 'Contact information updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update contact information: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
