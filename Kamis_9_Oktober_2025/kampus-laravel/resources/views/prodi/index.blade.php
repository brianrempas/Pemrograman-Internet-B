<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Prodi</title>
</head>
<body>
    <a href="{{ url('/') }}">← Kembali ke halaman utama</a>

    <h1>Daftar Prodi</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <a href="{{ url('/prodi/create') }}">Tambah Prodi</a>
    <br><br>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama Prodi</th>
            <th>Fakultas</th>
            <th>Aksi</th>
        </tr>
        @foreach ($prodi as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nama_prodi }}</td>
                <td>{{ $p->fakultas->nama_fakultas ?? '-' }}</td>
                <td>
                    <a href="{{ url('/prodi/'.$p->id.'/edit') }}">Edit</a> |
                    <form action="{{ url('/prodi/'.$p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br>
    <a href="{{ url('/') }}">← Kembali ke beranda</a>
</body>
</html>
