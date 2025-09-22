<!DOCTYPE html>
<html>
<head><title>Bilangan Genap</title></head>
<body>
    <h2>Cari Bilangan Genap</h2>
    <form method="post">
        Nilai n1: <input type="number" name="n1" required>
        Nilai n2: <input type="number" name="n2" required>
        <button type="submit">Tampilkan</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n1 = (int)$_POST['n1'];
        $n2 = (int)$_POST['n2'];
        if ($n1 < $n2) {
            echo "<p>Bilangan genap dari $n1 sampai $n2:</p>";
            for ($i = $n1; $i <= $n2; $i++) {
                if ($i % 2 == 0) echo $i . " ";
            }
        } else {
            echo "<p style='color:red'>n1 harus lebih kecil dari n2!</p>";
        }
    }
    ?>
</body>
</html>
