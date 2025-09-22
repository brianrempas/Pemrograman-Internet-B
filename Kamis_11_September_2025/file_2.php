<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>

    <h2>Kalkulator Sederhana</h2>

    <form method="POST">
        Angka 1: <input type="number" name="angka1" step="any" required><br><br>
        Angka 2: <input type="number" name="angka2" step="any" required><br><br>

        Operator: 
        <select name="operator" required>
            <option value="tambah">Tambah (+)</option>
            <option value="kurang">Kurang (-)</option>
            <option value="kali">Kali (×)</option>
            <option value="bagi">Bagi (÷)</option>
        </select><br><br>

        <input type="submit" name="hitung" value="Hitung">
    </form>

    <?php
        if (isset($_POST['hitung'])) {
            $angka1 = filter_input(INPUT_POST, 'angka1', FILTER_VALIDATE_FLOAT);
            $angka2 = filter_input(INPUT_POST, 'angka2', FILTER_VALIDATE_FLOAT);
            $operator = $_POST['operator'];

            if ($angka1 === false || $angka2 === false) {
                echo "<p style='color:red;'>Error: Masukkan angka yang valid.</p>";
            } else {
                $hasil = null;
                switch ($operator) {
                    case "tambah":
                    $hasil = $angka1 + $angka2;
                    break;
                    case "kurang":
                    $hasil = $angka1 - $angka2;
                    break;
                    case "kali":
                    $hasil = $angka1 * $angka2;
                    break;
                    case "bagi":
                    if ($angka2 == 0) {
                        echo "<p style='color:red;'>Error: Tidak bisa dibagi dengan nol!</p>";
                    } else {
                        $hasil = $angka1 / $angka2;
                    }
                    break;
                    default:
                    echo "<p style='color:red;'>Operator tidak valid!</p>";
                }

                if ($hasil !== null) {
                    echo "<h3>Hasil: $hasil</h3>";
                }
            }
        }
    ?>

</body>
</html>
