<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Prodi</title>
</head>
<body>
    <h1>Edit Prodi</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/prodi/'.$prodi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Prodi:</label><br>
        <input type="text" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}"><br><br>

        <label>Fakultas:</label><br>
        <select name="fakultas_id">
            @foreach($fakultas as $f)
                <option value="{{ $f->id }}" {{ $prodi->fakultas_id == $f->id ? 'selected' : '' }}>
                    {{ $f->nama_fakultas }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Perbarui</button>
    </form>

    <br>
    <a href="{{ url('/prodi') }}">← Kembali ke daftar</a>
</body>
</html>
