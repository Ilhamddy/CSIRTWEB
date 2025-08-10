<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $berita = Posts::orderBy('published_at', 'desc')->with('user')
            ->where('is_published', true)
            ->where('status', 'published')
            ->take(6)
            ->get();
        return view('pages.landing-page', compact('berita'));
    }
}
