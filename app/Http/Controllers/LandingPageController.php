<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Posts;
use App\Models\Video;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $berita = Posts::orderBy('created_at', 'desc')->with('user')
            ->where('is_published', true)
            ->where('status', 'published')
            ->take(6)
            ->get();
        $photos = Images::orderBy('created_at', 'desc')->take(8)->get();
        $videos = Video::orderBy('created_at', 'desc')->take(4)->get();
        return view('pages.landing-page', compact('berita', 'photos', 'videos'));
    }
}
