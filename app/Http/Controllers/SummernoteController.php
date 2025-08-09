<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SummernoteController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/summernote', $filename, 'public');

            // Return URL untuk ditampilkan di Summernote
            return response()->json([
                'url' => asset('storage/' . $path)
            ]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function delete(Request $request)
    {
        $src = $request->src;
        $path = str_replace(asset('storage') . '/', '', $src);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'file not found'], 404);
    }
}
