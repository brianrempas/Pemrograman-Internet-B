<!DOCTYPE html>
<html>
<head><title>Data Mahasiswa</title></head>
<body>
    <h2>Data Mahasiswa</h2>
    <?php
    $mahasiswa = [
        ["nim"=>"2405551171","nama"=>"Ayu Lestari","umur"=>20,"prodi"=>"Teknologi Informasi"],
        ["nim"=>"2405551172","nama"=>"Budi Santoso","umur"=>21,"prodi"=>"Informatika"],
        ["nim"=>"2405551173","nama"=>"Citra Dewi","umur"=>19,"prodi"=>"Sistem Informasi"],
        ["nim"=>"2405551174","nama"=>"Dewa Putra","umur"=>22,"prodi"=>"Teknologi Informasi"],
        ["nim"=>"2405551175","nama"=>"Eka Pratama","umur"=>20,"prodi"=>"Informatika"],
        ["nim"=>"2405551176","nama"=>"Fajar Nugraha","umur"=>21,"prodi"=>"Teknologi Informasi"],
        ["nim"=>"2405551177","nama"=>"Gita Maharani","umur"=>20,"prodi"=>"Sistem Informasi"],
        ["nim"=>"2405551178","nama"=>"Harianto","umur"=>23,"prodi"=>"Informatika"],
        ["nim"=>"2405551179","nama"=>"Indah Permata","umur"=>19,"prodi"=>"Teknologi Informasi"],
        ["nim"=>"2405551180","nama"=>"Joko Widodo","umur"=>22,"prodi"=>"Sistem Informasi"]
    ];
    ?>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>NIM</th><th>Nama</th><th>Umur</th><th>Program Studi</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
            <tr>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td align="center"><?= $mhs['umur'] ?></td>
                <td><?= $mhs['prodi'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
