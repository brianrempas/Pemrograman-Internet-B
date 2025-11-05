<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Fakultas;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ambil semua data dari tabel mahasiswa
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create(Request $request)
    {
        $fakultas = Fakultas::all();
        $selectedFakultas = $request->get('fakultas_id');
        $prodis = $selectedFakultas ? Prodi::where('fakultas_id', $selectedFakultas)->get() : collect();

        return view('mahasiswa.create', compact('fakultas', 'prodis', 'selectedFakultas'));
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

    public function edit($id, Request $request)
    {
        $m = Mahasiswa::findOrFail($id);
        $fakultas = Fakultas::all();

        // If fakultas_id is in the request (user changed dropdown), use it
        // Otherwise, get it from the mahasiswa's prodi
        $selectedFakultas = $request->get('fakultas_id') ?? $m->prodi->fakultas_id;

        // Get prodis based on selected fakultas
        $prodis = $selectedFakultas ? Prodi::where('fakultas_id', $selectedFakultas)->get() : collect();

        return view('mahasiswa.edit', compact('m', 'fakultas', 'prodis', 'selectedFakultas'));
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
        $m->update($request->only(['nim', 'nama', 'prodi_id']));

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
