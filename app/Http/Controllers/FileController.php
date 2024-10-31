<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048', // Contoh validasi file
        ]);

        // Upload file ke storage
        if ($request->file('file')) {
            $path = $request->file('file')->store('uploads');
            return back()->with('success', 'File berhasil diupload!')->with('path', $path);
        }

        return back()->withErrors(['file' => 'Gagal upload file.']);
    }
}
