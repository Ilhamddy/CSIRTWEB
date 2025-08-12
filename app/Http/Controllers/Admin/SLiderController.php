<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SLiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'link' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,nonactive',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'title.required' => 'Judul slider wajib diisi',
            'image.required' => 'Gambar slider wajib diunggah',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, jpg, atau png',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'status.required' => 'Status slider wajib dipilih',
        ]);

        try {
            $file = $request->file('image');
            $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('sliders', $uuidName, 'public');

            Slider::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $path,
                'link' => $request->link,
                'is_active' => $request->status === 'active' ? true : false,
                'sort_order' => $request->sort_order ?? 0,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('slider.index')->with('success', 'Slider berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan slider: ' . $e->getMessage());
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
        $slider = Slider::findOrFail($id);
        return view('pages.admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|in:active,nonactive',
            'sort_order' => 'nullable|integer|min:0',
        ], [
            'title.required' => 'Judul slider wajib diisi',
            'status.required' => 'Status slider wajib dipilih',
        ]);

        try {
            $slider = Slider::findOrFail($id);
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'is_active' => $request->status === 'active' ? true : false,
                'sort_order' => $request->sort_order ?? 0,
            ];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('sliders', $uuidName, 'public');
                $data['image'] = $path;

                if ($slider->image) {
                    Storage::disk('public')->delete($slider->image);
                }
            }

            $slider->update($data);

            return redirect()->route('slider.index')->with('success', 'Slider berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui slider: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slider = Slider::findOrFail($id);
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $slider->delete();

            return redirect()->route('slider.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus slider: ' . $e->getMessage());
        }
    }
}
