<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

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
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswa,nim',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        // simpan data baru ke database
        Mahasiswa::create($request->only(['nim', 'nama', 'prodi']));

        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswa,nim,'.$id, // ignore current ID
            'nama' => 'required',
            'prodi' => 'required'
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
