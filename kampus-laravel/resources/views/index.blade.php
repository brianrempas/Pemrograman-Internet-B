<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Kampus</title>
    <style>
        /* Reset & base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            text-align: center;
            margin-top: 50px;
        }

        header h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        header p {
            font-size: 1.1rem;
            color: #555;
        }

        /* Menu container */
        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 60px;
            gap: 25px;
        }

        .menu a {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 40px;
            min-width: 180px;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .menu a:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        /* Animated arrow effect */
        .menu a::after {
            content: '→';
            position: absolute;
            right: 20px;
            opacity: 0;
            transition: 0.3s;
        }

        .menu a:hover::after {
            right: 15px;
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .menu a {
                min-width: 140px;
                padding: 15px 25px;
            }

            header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Dashboard Kampus</h1><h3>2405551179 Brian Salomo Rempasito</h3>
        <p>Pilih salah satu menu di bawah ini untuk mengelola data:</p>
    </header>

    <div class="menu">
        <a href="{{ url('/mahasiswa') }}">Kelola Mahasiswa</a>
        <a href="{{ url('/prodi') }}">Kelola Program Studi</a>
        <a href="{{ url('/fakultas') }}">Kelola Fakultas</a>
    </div>

</body>
</html>
