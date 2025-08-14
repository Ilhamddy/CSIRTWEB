<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        return view('pages.admin.profile.index', compact('profile'));
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
        $request->validate([
            'visi' => 'required|string|max:255',
            'misi' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'tupoksi' => 'required|string',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        $profile = Profile::first();
        // dd($profile);
        try {
            $profile = Profile::first() ?? new Profile();

            $profile->visi = $request->visi;
            $profile->misi = $request->misi;
            $profile->sejarah = $request->tupoksi;
            $profile->user_id = auth()->id();

            if ($request->hasFile('logo')) {
                $profile->logo = $request->file('logo')->store('logos', 'public');
            }

            if ($request->hasFile('struktur_organisasi')) {
                $profile->struktur_organisasi = $request->file('struktur_organisasi')->store('struktur_organisasi', 'public');
            }

            $profile->save();

            return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('profile.index')->with('error', 'Failed to update profile.');
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
        $request->validate([
            'visi' => 'required|string|max:255',
            'misi' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'tupoksi' => 'required|string',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        try {
            $profile = Profile::findFirstOrFail();
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $profile->logo = $logoPath;
            }

            if ($request->hasFile('struktur_organisasi')) {
                $strukturOrganisasiPath = $request->file('struktur_organisasi')->store('struktur_organisasi', 'public');
                $profile->struktur_organisasi = $strukturOrganisasiPath;
            }
            if (!$profile) {
                $profile = new Profile();
                $profile->user_id = auth()->id();
                $profile->visi = $request->input('visi');
                $profile->misi = $request->input('misi');
                $profile->sejarah = $request->input('tupoksi');
            } else {
                $profile->user_id = auth()->id();
            }

            $profile->sejarah = $request->input('tupoksi');
            $profile->save();

            return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('profile.index')->with('error', 'Failed to update profile.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
