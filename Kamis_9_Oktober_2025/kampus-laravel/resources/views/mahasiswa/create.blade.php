<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>

    {{-- Validation errors --}}
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/mahasiswa') }}" method="POST">
        @csrf
        <label>NIM:</label><br>
        <input type="text" name="nim" value="{{ old('nim') }}"><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Program Studi:</label><br>
        <select name="prodi_id">
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodis as $p)
                <option value="{{ $p->id }}" {{ old('prodi_id') == $p->id ? 'selected' : '' }}>
                    {{ $p->nama_prodi }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ url('/mahasiswa') }}">← Kembali ke daftar</a>
</body>
</html>
