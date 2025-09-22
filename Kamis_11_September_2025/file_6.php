<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata Singkat</title>
</head>
<body>

    <h2>Form Biodata Singkat</h2>

    <form method="POST">
        Nama: <input type="text" name="nama" required><br><br>
        Umur: <input type="number" name="umur" min="1" required><br><br>
        Jenis Kelamin: 
        <input type="radio" name="jk" value="Laki-laki" required> Laki-laki
        <input type="radio" name="jk" value="Perempuan" required> Perempuan
        <br><br>
        Alamat: <textarea name="alamat" required></textarea><br><br>
        <input type="submit" name="submit" value="Kirim">
    </form>

    <?php
        if (isset($_POST['submit'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $umur = $_POST['umur'];
            $jk = $_POST['jk'];
            $alamat = htmlspecialchars($_POST['alamat']);

            echo "<h3>Hasil Biodata:</h3>";
            echo "Halo, nama saya $nama. Umur saya $umur tahun. Saya seorang $jk. Saya tinggal di $alamat.";
        }
    ?>

</body>
</html>
