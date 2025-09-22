<!DOCTYPE html>
<html>
<head>
    <title>Menentukan Nilai Huruf</title>
</head>
<body>

    <h2>Cek Nilai Huruf</h2>

    <form method="POST">
        Masukkan nilai (0 - 100): 
        <input type="number" name="nilai" min="0" max="100" required><br><br>
        <input type="submit" name="cek" value="Cek Grade">
    </form>

    <?php
        if (isset($_POST['cek'])) {
            $nilai = $_POST['nilai'];
            $grade = "";

            if ($nilai >= 85) {
                $grade = "A";
            } elseif ($nilai >= 70) {
                $grade = "B";
            } elseif ($nilai >= 55) {
                $grade = "C";
            } elseif ($nilai >= 40) {
                $grade = "D";
            } else {
                $grade = "E";
            }

            echo "<h3>Nilai: $nilai<br>Grade: $grade</h3>";
        }
    ?>

</body>
</html>
