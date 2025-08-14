<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function foto()
    {
        $photos = Images::latest()->paginate(12);

        return view('pages.gallery.foto', compact('photos'));
    }
}
