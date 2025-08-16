<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('pages.layanan', compact('layanans'));
    }

    public function show($slug)
    {
        $layanan = Layanan::where('slug', $slug)->where('is_active', true)->where('link', '=', null)->firstOrFail();
        return view('pages.detail-layanan', compact('layanan'));
    }
}
