<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::with('fakultas')->get();
        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id'
        ]);
        Prodi::create($request->only(['nama_prodi', 'fakultas_id']));

        return redirect('/prodi')->with('success', 'Prodi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id'
        ]);

        $p = Prodi::findOrFail($id);
        $p->update($request->only(['nama_prodi', 'fakultas_id']));

        return redirect('/prodi')->with('success', 'Prodi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Prodi::destroy($id);
        return redirect('/prodi')->with('success', 'Prodi berhasil dihapus.');
    }
}
