<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Daftar Fakultas</title></head>
<body>
    <a href="{{ url('/') }}">← Kembali ke halaman utama</a>

<h1>Daftar Fakultas</h1>

<a href="{{ url('/fakultas/create') }}">Tambah Fakultas</a><br><br>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
<tr><th>ID</th><th>Nama Fakultas</th><th>Aksi</th></tr>
@foreach($fakultas as $f)
<tr>
<td>{{ $f->id }}</td>
<td>{{ $f->nama_fakultas }}</td>
<td>
    <a href="{{ url('/fakultas/'.$f->id.'/edit') }}">Edit</a> |
    <form action="{{ url('/fakultas/'.$f->id) }}" method="POST" style="display:inline">
        @csrf @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin?')">Hapus</button>
    </form>
</td>
</tr>
@endforeach
</table>
</body>
</html>
