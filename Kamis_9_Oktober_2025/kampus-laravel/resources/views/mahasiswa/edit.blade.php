<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    {{-- Validation errors --}}
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/mahasiswa/'.$m['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <label>NIM:</label><br>
        <input type="text" name="nim" value="{{ old('nim', $m['nim']) }}"><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama', $m['nama']) }}"><br><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi" value="{{ old('prodi', $m['prodi']) }}"><br><br>

        <button type="submit">Perbarui</button>
    </form>

    <br>
    <a href="{{ url('/mahasiswa') }}">← Kembali ke daftar</a>
</body>
</html>
