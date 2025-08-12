<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Category;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::with('category')->orderBy('created_at', 'desc')->paginate(10);
        foreach ($agendas as $agenda) {
            // Format the start and end dates
            $agenda->start_date = \Carbon\Carbon::parse($agenda->start_date)->format('d-m-Y H:i:s');
            $agenda->end_date = $agenda->end_date ? \Carbon\Carbon::parse($agenda->end_date)->format('d-m-Y H:i:s') : null;
        }

        return view('pages.admin.agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.agenda.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Judul agenda wajib diisi',
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'category_id.required' => 'Kategori agenda wajib dipilih',
        ]);

        try {
            Agenda::create([
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat agenda: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $agenda = Agenda::findOrFail($id);
        return view('pages.admin.agenda.edit', compact('agenda', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Judul agenda wajib diisi',
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'category_id.required' => 'Kategori agenda wajib dipilih',
        ]);

        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->update([
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui agenda: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->delete();

            return redirect()->route('agenda.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus agenda: ' . $e->getMessage());
        }
    }
}
