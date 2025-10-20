<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard Kampus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f9fa;
        }
        h1 {
            color: #333;
        }
        .menu {
            margin-top: 50px;
        }
        a {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Dashboard Kampus</h1>
    <p>Pilih salah satu menu di bawah ini:</p>

    <div class="menu">
        <a href="{{ url('/mahasiswa') }}">Kelola Mahasiswa</a>
        <a href="{{ url('/prodi') }}">Kelola Program Studi</a>
        <a href="{{ url('/fakultas') }}">Kelola Fakultas</a>
    </div>

</body>
</html>
