<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    {{-- Flash messages --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <a href="{{ url('/mahasiswa/create') }}">Tambah Mahasiswa</a>
    <br><br>

    <h3>Daftar Mahasiswa</h3>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Aksi</th>
    </tr>
    @foreach ($mahasiswa as $m)
        <tr>
            <td>{{ $m['id'] }}</td>
            <td>{{ $m['nim'] }}</td>
            <td>{{ $m['nama'] }}</td>
            <td>{{ $m['prodi'] }}</td>
            <td>
                <a href="{{ url('/mahasiswa/'.$m['id'].'/edit') }}">Edit</a> |
                <form action="{{ url('/mahasiswa/'.$m['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
