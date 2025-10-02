<?php include "../koneksi.php"; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>

<h3>Tambah Nilai - <?php echo $data['nama']; ?> (<?php echo $data['nim']; ?>)</h3>
<form method="post" onsubmit="return validasi()">
   Mata Kuliah: <input type="text" id="mata_kuliah" name="mata_kuliah"><br>
   SKS: <input type="number" id="sks" name="sks"><br>
   Nilai Angka: <input type="text" id="nilai_angka" name="nilai_angka"><br>
   <input type="submit" name="simpan" value="Simpan">
</form>
<p id="pesan"></p>

<script>
    function validasi() {
       let mk = document.querySelector("#mata_kuliah").value.trim();
       let sks = document.querySelector("#sks").value.trim();
       let nilai = document.querySelector("#nilai_angka").value.trim();

       if (mk === "" || sks === "" || nilai === "") {
           document.querySelector("#pesan").innerHTML = "Semua field wajib diisi!";
           return false;
       }
       if (isNaN(sks) || sks <= 0) {
           document.querySelector("#pesan").innerHTML = "SKS harus angka positif!";
           return false;
       }
       if (isNaN(nilai) || nilai < 0 || nilai > 100) {
           document.querySelector("#pesan").innerHTML = "Nilai angka harus 0 - 100!";
           return false;
       }
       return true;
   }
</script>

<?php
if (isset($_POST['simpan'])) {
    $mk    = $_POST['mata_kuliah'];
    $sks   = $_POST['sks'];
    $angka = $_POST['nilai_angka'];

    if ($angka >= 85) {
        $huruf = "A";
        $bobot = 4.00;
    } elseif ($angka >= 70) {
        $huruf = "B";
        $bobot = 3.00;
    } elseif ($angka >= 55) {
        $huruf = "C";
        $bobot = 2.00;
    } elseif ($angka >= 40) {
        $huruf = "D";
        $bobot = 1.00;
    } else {
        $huruf = "E";
        $bobot = 0.00;
    }

    $sql = "INSERT INTO nilai (mahasiswa_id, mata_kuliah, sks, nilai_angka, nilai_huruf) 
    VALUES ('$id','$mk','$sks','$bobot','$huruf')";
    if ($conn->query($sql) === TRUE) {
        echo "Nilai berhasil ditambahkan <a href='nilai.php?id=$id'>Kembali</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

