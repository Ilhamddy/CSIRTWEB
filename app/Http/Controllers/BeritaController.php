<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Posts::orderBy('created_at', 'desc')->with('user')
            ->where('is_published', true)
            ->where('status', 'published')
            ->paginate(12);
        return view('pages.berita-page', compact('berita'));
    }

    public function show($slug)
    {
        $post = Posts::where('slug', $slug)->with('user')->first();
        $posts = Posts::orderBy('created_at', 'desc')->with('user')
            ->where('is_published', true)
            ->where('status', 'published')
            ->get();
        return view('pages.detail-berita-page', compact('post', 'posts'));
    }
}
