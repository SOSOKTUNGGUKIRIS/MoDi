<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        // Ambil semua data modul
        $moduls = Modul::all();
        return view('modul.index', compact('moduls'));
    }

    public function show($id)
    {
        // Cari modul berdasarkan ID
        $modul = Modul::findOrFail($id);
        $filePath = storage_path('app/pdf/' . $modul->pdf_file);

        // Pastikan file ada dan valid
        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            abort(404, 'File not found');
        }
    }

    public function download($id)
    {
        // Cari modul berdasarkan ID
        $modul = Modul::findOrFail($id);
        $filePath = storage_path('app/pdf/' . $modul->pdf_file);

        // Pastikan file ada dan valid
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            abort(404, 'File not found');
        }
    }

    // Menampilkan formulir untuk menambahkan modul
    public function create()
    {
        return view('modul.create');
    }

    // Menyimpan modul dan file PDF ke storage
    public function store(Request $request)
    {
        // Validasi form input
        $request->validate([
            'title' => 'required|string|max:255',
            'pdf_file' => 'required|file|mimes:pdf|max:10240', // 10MB maksimal
        ]);

        // Menyimpan file PDF ke folder storage/app/pdf
        $fileName = $request->pdf_file->getClientOriginalName();
        $request->pdf_file->storeAs('pdf', $fileName, 'public'); // Menyimpan file PDF

        // Simpan data modul ke database
        Modul::create([
            'title' => $request->title,
            'pdf_file' => $fileName,  // Menyimpan nama file PDF di database
        ]);

        return redirect()->route('modul.index')->with('success', 'Modul berhasil ditambahkan!');
    }

}
