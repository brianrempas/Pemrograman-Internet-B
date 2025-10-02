<?php include "../koneksi.php"; ?>
<?php
$id = $_GET['id'];
$mhs = $_GET['mhs'];
$sql = "DELETE FROM nilai WHERE id=$id";
if ($conn->query($sql) === TRUE) {
   echo "Data berhasil dihapus <a href='nilai.php?id=$mhs'>Kembali</a>";
} else {
   echo "Error: " . $conn->error;
}
?>