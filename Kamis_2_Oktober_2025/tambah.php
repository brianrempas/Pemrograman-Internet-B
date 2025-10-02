<?php include "koneksi.php"; ?>
<form method="post" onsubmit="return validasi()">
 NIM: <input type="text" id="nim" name="nim"><br>
 Nama: <input type="text" id="nama" name="nama"><br>
 Prodi: <input type="text" id="prodi" name="prodi"><br>
 <input type="submit" name="simpan" value="Simpan">
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
if (isset($_POST['simpan'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $sql = "INSERT INTO mahasiswa (nim, nama, prodi) VALUES ('$nim','$nama','$prodi')";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan <a href='index.php'>Kembali</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
