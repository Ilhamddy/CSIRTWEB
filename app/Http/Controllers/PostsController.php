<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::paginate(10);
        return view('pages.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        return view('pages.post.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:berita,pengumuman,kegiatan',
            'content' => 'required|string',
            'source' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'title.required' => 'Judul post wajib diisi',
            'title.max' => 'Judul post maksimal 255 karakter',
            'type.required' => 'Kategori post wajib dipilih',
            'type.in' => 'Kategori post tidak valid',
            'content.required' => 'Konten post wajib diisi',
            'status.required' => 'Status post wajib dipilih',
            'status.in' => 'Status post tidak valid',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, jpg, atau png',
            'image.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        try {
            // Upload gambar jika ada
            $imagePath = null;
            if ($request->hasFile('image')) {
                $file     = $request->file('image');
                $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('posts', $uuidName, 'public');
            }

            // Simpan ke database
            $post = Posts::create([
                'title'         => $request->title,
                'content'       => $request->content,
                'slug'          => Str::slug($request->title),
                'type'          => $request->type,
                'user_id'       => Auth::id() ?? 1, // default 1 kalau belum login
                'image'         => $imagePath,
                'source'        => $request->source,
                'is_published'  => $request->status === 'published' ? 1 : 0,
                'published_at'  => $request->status === 'published' ? now() : null,
                'tags'          => $request->tags,
                'views'         => 0,
                'likes'         => 0,
                'comments_count' => 0,
                'status'        => $request->status,
            ]);

            return redirect()->route('posts.index')
                ->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error saving post: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan post. Silakan coba lagi.')
                ->withInput();
        }
    }

    public function show($id)
    {
        $post = Posts::findOrFail($id);
        return view('pages.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        // $categories = Category::all();
        return view('pages.post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'title'   => 'required|string|max:255',
            'type'    => 'required|string',
            'content' => 'required|string',
            'source'  => 'nullable|url',
            'tags'    => 'nullable|string',
            'status'  => 'required|string|in:published,draft',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $post = Posts::findOrFail($id);

            $imagePath = $post->image; // default image path

            // Upload gambar baru
            if ($request->hasFile('image')) {
                $file     = $request->file('image');
                $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('posts', $uuidName, 'public');

                // Hapus gambar lama jika ada
                if ($post->image && Storage::exists('public/' . $post->image)) {
                    Storage::delete('public/' . $post->image);
                }
            }

            // Update data
            $post->update([
                'title'         => $request->title,
                'content'       => $request->content,
                'slug'          => Str::slug($request->title),
                'type'          => $request->type,
                // 'user_id'       => Auth::id() ?? 1, // default 1 kalau belum login
                'image'         => $imagePath,
                'source'        => $request->source,
                'is_published'  => $request->status === 'published' ? 1 : 0,
                'published_at'  => $request->status === 'published' ? now() : null,
                'tags'          => $request->tags,
                'status'        => $request->status,
            ]);

            return redirect()
                ->route('posts.index')
                ->with('success', 'Post berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui post.')
                ->withInput();
        }
    }
    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
