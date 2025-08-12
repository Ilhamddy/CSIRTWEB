<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Images::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.gallery.foto.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.gallery.foto.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'date_agenda' => 'nullable|date',
        ], [
            'title.required' => 'Judul foto wajib diisi',
            'category_id.required' => 'Kategori foto wajib dipilih',
            'image.required' => 'Gambar wajib diunggah',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, jpg, atau png',
            'image.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        try {
            $file = $request->file('image');
            $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('photos', $uuidName, 'public');

            Images::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'image_path' => $path,
                'date_agenda' => $request->date_agenda ?? now(),
                'user_id' => auth()->id(),
            ]);


            return redirect()->route('foto.index')->with('success', 'Foto berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan foto: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $photo = Images::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin.gallery.foto.edit', compact('photo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'date_agenda' => 'nullable|date',
        ], [
            'title.required' => 'Judul foto wajib diisi',
            'category_id.required' => 'Kategori foto wajib dipilih',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, jpg, atau png',
            'image.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        try {
            $photo = Images::findOrFail($id);
            $data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'date_agenda' => $request->date_agenda ?? now(),
            ];

            if ($request->hasFile('image')) {


                $file = $request->file('image');
                $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('photos', $uuidName, 'public');
                $data['image_path'] = $path;

                // Hapus gambar lama jika ada
                if ($photo->image_path) {
                    Storage::disk('public')->delete($photo->image_path);
                }
            }

            $photo->update($data);

            return redirect()->route('foto.index')->with('success', 'Foto berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui foto: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $photo = Images::findOrFail($id);

            // Hapus gambar dari storage
            if ($photo->image_path) {
                Storage::disk('public')->delete($photo->image_path);
            }

            $photo->delete();

            return redirect()->route('foto.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }
}
