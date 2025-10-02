<?php include "koneksi.php"; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>
<form method="post" onsubmit="return validasi()">
   NIM: <input type="text" id="nim" name="nim" value="<?= $data['nim'] ?>"><br>
   Nama: <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>"><br>
   Prodi: <input type="text" id="prodi" name="prodi" value="<?= $data['prodi'] ?>"><br>
   <input type="submit" name="update" value="Update">
</form>
<p id="pesan"></p>

<script>
   function validasi() {
      let nim = document.querySelector("#nim").value.trim();
      let nama = document.querySelector("#nama").value.trim();
      let prodi = document.querySelector("#prodi").value.trim();

      if (nim.length < 5) {
       document.querySelector("#pesan").innerHTML = "NIM minimal 5 karakter!";
       return false;
    }
    if (nama === "" || prodi === "") {
       document.querySelector("#pesan").innerHTML = "Nama dan Prodi tidak boleh kosong!";
       return false;
    }
    return true;
 }
</script>

<?php
if (isset($_POST['update'])) {
   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $prodi = $_POST['prodi'];
   $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id=$id";
   if ($conn->query($sql) === TRUE) {
    echo "Data berhasil diperbarui <a href='index.php'>Kembali</a>";
 } else {
    echo "Error: " . $conn->error;
 }
}
?>
