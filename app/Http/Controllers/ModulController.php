<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        $moduls = Modul::all();
        return view('modul.index', compact('moduls'));
    }

    public function create()
    {
        return view('modul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Modul::create($request->all());
        return redirect()->route('modul.index');
    }

    public function edit(Modul $modul)
    {
        return view('modul.edit', compact('modul'));
    }

    public function update(Request $request, Modul $modul)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $modul->update($request->all());
        return redirect()->route('modul.index');
    }

    public function destroy(Modul $modul)
    {
        $modul->delete();
        return redirect()->route('modul.index');
    }
}