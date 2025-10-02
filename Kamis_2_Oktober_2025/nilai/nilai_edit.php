<?php include "../koneksi.php"; ?>
<?php
$id  = (int)$_GET['id'];
$mhs = (int)$_GET['mhs'];

$result = $conn->query("SELECT * FROM nilai WHERE id=$id");
$data   = $result->fetch_assoc();

if (!$data) {
    die("Data nilai tidak ditemukan. <a href='nilai.php?id=$mhs'>Kembali</a>");
}
?>
<h3>Edit Nilai</h3>
<form method="post">
 Mata Kuliah: <input type="text" name="mata_kuliah" value="<?= htmlspecialchars($data['mata_kuliah']) ?>"><br>
 SKS: <input type="number" name="sks" value="<?= (int)$data['sks'] ?>"><br>
 Nilai Input: <input type="number" name="nilai_input" placeholder="(0-100)" value=""><br>
 <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $mk    = trim($_POST['mata_kuliah']);
    $sks   = isset($_POST['sks']) ? (int)$_POST['sks'] : 0;
    $angka = $_POST['nilai_input']; 

    $errors = [];

    if ($mk === "") {
        $errors[] = "Mata kuliah tidak boleh kosong.";
    }
    if ($sks <= 0) {
        $errors[] = "SKS harus lebih dari 0.";
    }
    if ($angka < 0 || $angka > 100) {
        $errors[] = "Nilai harus di antara 0 - 100.";
    }
    if ($angka === "" || !is_numeric($angka)) {
        $errors[] = "Nilai tidak boleh kosong.";
    }

    if (!empty($errors)) {
        foreach ($errors as $e) {
            echo "<p style='color:red;'>$e</p>";
        }
    } else {
        if ($angka >= 85) {
            $huruf = "A"; $bobot = 4.00;
        } elseif ($angka >= 70) {
            $huruf = "B"; $bobot = 3.00;
        } elseif ($angka >= 55) {
            $huruf = "C"; $bobot = 2.00;
        } elseif ($angka >= 40) {
            $huruf = "D"; $bobot = 1.00;
        } else {
            $huruf = "E"; $bobot = 0.00;
        }

        $stmt = $conn->prepare("UPDATE nilai SET mata_kuliah=?, sks=?, nilai_angka=?, nilai_huruf=? WHERE id=?");
        $stmt->bind_param("sidsi", $mk, $sks, $bobot, $huruf, $id);

        if ($stmt->execute()) {
            echo "Nilai berhasil diperbarui <a href='nilai.php?id=$mhs'>Kembali</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
