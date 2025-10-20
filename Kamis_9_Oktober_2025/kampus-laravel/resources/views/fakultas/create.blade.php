<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Tambah Fakultas</title></head>
<body>
<h1>Tambah Fakultas</h1>

<form action="{{ url('/fakultas') }}" method="POST">
    @csrf
    <label>Nama Fakultas:</label><br>
    <input type="text" name="nama_fakultas" value="{{ old('nama_fakultas') }}"><br><br>
    <button type="submit">Simpan</button>
</form>

<a href="{{ url('/fakultas') }}">← Kembali</a>
</body>
</html>
