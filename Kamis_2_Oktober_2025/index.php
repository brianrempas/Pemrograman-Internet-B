<?php include "koneksi.php"; ?>
<h3>Daftar Mahasiswa</h3>
<a href="tambah.php">Tambah Mahasiswa</a>
<a href="cari-mahasiswa.php">Cari Mahasiswa</a>

<table border="1" cellpadding="5">
 <tr>
   <th>ID</th><th>NIM</th><th>Nama</th><th>Prodi</th><th>Aksi</th>
 </tr>
 <?php
 $result = $conn->query("SELECT * FROM mahasiswa");
 while ($row = $result->fetch_assoc()) {
     echo "<tr>
     <td>{$row['id']}</td>
     <td>{$row['nim']}</td>
     <td>{$row['nama']}</td>
     <td>{$row['prodi']}</td>
     <td>
     <a href='edit.php?id={$row['id']}'>Edit</a> | 
     <a href='hapus.php?id={$row['id']}'>Hapus</a> |
     <a href='nilai/nilai.php?id={$row['id']}'>Nilai</a>
     </td>
     </tr>";
 }
 ?>
</table>