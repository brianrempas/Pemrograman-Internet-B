<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ambil semua data dari tabel mahasiswa
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        $prodis = Prodi::all();
        return view('mahasiswa.edit', compact('m', 'prodis'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswa,nim',
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodi,id'
        ]);

        Mahasiswa::create($request->only(['nim', 'nama', 'prodi_id']));

        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required|exists:prodi,id',
        ]);

        // update data di database
        $m = Mahasiswa::findOrFail($id);
        $m->update($request->only(['nim', 'nama', 'prodi']));

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
