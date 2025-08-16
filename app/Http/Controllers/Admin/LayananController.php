<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::paginate(10);

        return view('pages.admin.layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate and store the new Layanan
        $request->validate([
            'title' => 'required|string|max:255|unique:layanans',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'link' => 'nullable|url',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        try {

            $imagePath = null;
            if ($request->hasFile('icon')) {
                $file     = $request->file('icon');
                $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('layanan', $uuidName, 'public');
            }

            Layanan::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'icon' => $imagePath,
                'link' => $request->link,
                'is_active' => $request->is_active ?? true,
                'user_id' => Auth::id(),
                'order' => $request->order ?? 0,
            ]);

            return redirect()->route('layanan.index')->with('success', 'Layanan created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create Layanan: ' . $e->getMessage()]);
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
        $layanan = Layanan::findOrFail($id);

        return view('pages.admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        $layanan = Layanan::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255|unique:layanans,title,' . $layanan->id,
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'link' => 'nullable|url',
            // 'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        try {
            $imagePath = $layanan->icon;
            if ($request->hasFile('icon')) {
                $file     = $request->file('icon');
                $uuidName = (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
                $imagePath = $file->storeAs('layanan', $uuidName, 'public');

                if ($layanan->image && Storage::exists('public/' . $layanan->icon)) {
                    Storage::delete('public/' . $layanan->icon);
                }
            }

            $layanan->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'icon' => $imagePath,
                'link' => $request->link,
                'is_active' => $request->is_active ?? $layanan->is_active,
                'user_id' => Auth::id(),
                'order' => $request->order ?? 0,
            ]);

            return redirect()->route('layanan.index')->with('success', 'Layanan updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update Layanan: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $layanan = Layanan::findOrFail($id);
        try {
            if ($layanan->icon && Storage::exists('public/' . $layanan->icon)) {
                Storage::delete('public/' . $layanan->icon);
            }
            $layanan->delete();

            return redirect()->route('layanan.index')->with('success', 'Layanan deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete Layanan: ' . $e->getMessage()]);
        }
    }
}
