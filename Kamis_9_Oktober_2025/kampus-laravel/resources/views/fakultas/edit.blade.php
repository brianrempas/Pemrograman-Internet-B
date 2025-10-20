<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Fakultas</title>
</head>
<body>
    <h1>Edit Fakultas</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/fakultas/'.$fakultas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Fakultas:</label><br>
        <input type="text" name="nama_fakultas" value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}"><br><br>

        <button type="submit">Perbarui</button>
    </form>

    <br>
    <a href="{{ url('/fakultas') }}">← Kembali ke daftar</a>
</body>
</html>
