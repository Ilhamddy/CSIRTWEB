<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.gallery.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.gallery.video.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'url' => 'required|string|max:255',
            'date_agenda' => 'nullable|date',
        ], [
            'title.required' => 'Judul video wajib diisi',
            'category_id.required' => 'Kategori video wajib dipilih',
            'url.required' => 'Url wajib diisi',
        ]);

        try {

            Video::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'url' => $request->url,
                'date_agenda' => $request->date_agenda ?? now(),
                'user_id' => auth()->id(),
            ]);


            return redirect()->route('video.index')->with('success', 'Video berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan video: ' . $e->getMessage());
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
        $video = Video::findOrFail($id);
        $categories = Category::all();
        return view('pages.gallery.video.edit', compact('video', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'url' => 'required|string|max:255',
            'date_agenda' => 'nullable|date',
        ], [
            'title.required' => 'Judul video wajib diisi',
            'category_id.required' => 'Kategori video wajib dipilih',
            'url.required' => 'Url wajib diisi',
        ]);

        try {
            $photo = Video::findOrFail($id);
            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'url' => $request->url,
                'date_agenda' => $request->date_agenda ?? now(),
            ];



            $photo->update($data);

            return redirect()->route('video.index')->with('success', 'Video berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui video: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $video = Video::findOrFail($id);
            $video->delete();

            return redirect()->route('video.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus video: ' . $e->getMessage());
        }
    }
}
