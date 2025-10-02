<?php include "../koneksi.php"; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>
<h3>Daftar Nilai - <?php echo $data['nama']; ?> (<?php echo $data['nim']; ?>)</h3>
<?php echo "<a href='nilai_tambah.php?id={$id}'>Tambah Nilai</a> " ?>
<?php echo "<a href='nilai_cari.php?id={$id}'>Cari Matakuliah</a> " ?>
<a href="../index.php">Kembali</a>

<table border="1" cellpadding="5">
  <tr>
    <th>ID</th><th>Mata Kuliah</th><th>SKS</th><th>Nilai Angka</th><th>Nilai Huruf</th><th>Aksi</th>
 </tr>
 <?php
 $result = $conn->query("SELECT * FROM nilai WHERE mahasiswa_id=$id");
 while ($row = $result->fetch_assoc()) {
  echo "<tr>
  <td>{$row['id']}</td>
  <td>{$row['mata_kuliah']}</td>
  <td>{$row['sks']}</td>
  <td>{$row['nilai_angka']}</td>
  <td>{$row['nilai_huruf']}</td>
  <td>
  <a href='nilai_edit.php?id={$row['id']}&mhs=$id'>Edit</a> | 
  <a href='nilai_hapus.php?id={$row['id']}&mhs=$id' onclick=\"return confirm('Hapus nilai?')\">Hapus</a>
  </td>
  </tr>";
}
?>
</table>
