<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Video;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function foto()
    {
        $photos = Images::latest()->paginate(12);

        return view('pages.gallery.foto', compact('photos'));
    }

    public function video()
    {
        $videos = Video::latest()->paginate(6);
        return view('pages.gallery.video', compact('videos'));
    }
}
