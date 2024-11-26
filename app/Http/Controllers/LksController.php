<?php

namespace App\Http\Controllers;

use App\Models\Lks;
use App\Models\Modul;
use Illuminate\Http\Request;

class LksController extends Controller
{
    public function index()
    {
        $lks = Lks::all();
        return view('lks.index', compact('lks'));
    }

    public function create()
    {
        $moduls = Modul::all(); // Menampilkan semua modul untuk dipilih
        return view('lks.create', compact('moduls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'modul_id' => 'required|exists:moduls,id',
        ]);

        Lks::create($request->all());
        return redirect()->route('lks.index');
    }

    public function edit(Lks $lks)
    {
        $moduls = Modul::all();
        return view('lks.edit', compact('lks', 'moduls'));
    }

    public function update(Request $request, Lks $lks)
    {
        $request->validate([
            'name' => 'required',
            'modul_id' => 'required|exists:moduls,id',
        ]);

        $lks->update($request->all());
        return redirect()->route('lks.index');
    }

    public function destroy(Lks $lks)
    {
        $lks->delete();
        return redirect()->route('lks.index');
    }
}