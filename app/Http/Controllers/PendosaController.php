<?php

namespace App\Http\Controllers;

use App\Models\Pendosa;
use Illuminate\Http\Request;

class PendosaController extends Controller
{
    public function index()
    {
        $pendosa = \App\Models\Pendosa::orderBy('jumlah_dosa', 'desc')->get();
        return view('pendosa.index', compact('pendosa'));
    }

    public function create()
    {
        return view('pendosa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'dosa' => 'required|string|max:255',
            'jumlah_dosa' => 'required|integer',
        ]);

        Pendosa::create($request->all());
        return redirect()->route('pendosa.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Pendosa $pendosa)
    {
        return view('pendosa.show', compact('pendosa'));
    }

    public function edit(Pendosa $pendosa)
    {
        return view('pendosa.edit', compact('pendosa'));
    }

    public function update(Request $request, Pendosa $pendosa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'dosa' => 'required|string|max:255',
            'jumlah_dosa' => 'required|integer',
        ]);

        $pendosa->update($request->all());
        return redirect()->route('pendosa.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Pendosa $pendosa)
    {
        $pendosa->delete();
        return redirect()->route('pendosa.index')->with('success', 'Data berhasil dihapus');
    }
    public function simpanDosa(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'dosa' => 'required|string|max:255',
            'jumlah_dosa' => 'required|integer',
        ]);

        $pendosa = new \App\Models\Pendosa();
        $pendosa->nama = $request->nama;
        $pendosa->dosa = $request->dosa;
        $pendosa->jumlah_dosa = $request->jumlah_dosa;
        $pendosa->save();

        return response()->json(['success' => true]);
    }
}
