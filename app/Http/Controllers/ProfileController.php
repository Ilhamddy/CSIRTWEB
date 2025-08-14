<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function visimisi()
    {
        $profile = \App\Models\Profile::first();

        return view('pages.visi-misi', compact('profile'));
    }

    public function strukturOrganisasi()
    {
        $profile = \App\Models\Profile::first();

        return view('pages.struktur-organisasi', compact('profile'));
    }

    public function tupoksi()
    {
        $profile = \App\Models\Profile::first();

        return view('pages.tupoksi', compact('profile'));
    }
}
