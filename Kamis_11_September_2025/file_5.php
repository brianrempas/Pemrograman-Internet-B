<!DOCTYPE html>
<html>
<head>
    <title>Menu Makanan</title>
</head>
<body>

    <h2>Pilih Menu Makanan</h2>

    <form method="POST">
        <label for="menu">Pilih makanan:</label>
        <select name="menu" id="menu" required>
            <option value="nasigoreng">Nasi Goreng</option>
            <option value="soto">Soto</option>
            <option value="mieayam">Mie Ayam</option>
        </select><br><br>

        <input type="submit" name="pilih" value="Lihat Harga">
    </form>

    <?php
        if (isset($_POST['pilih'])) {
            $menu = $_POST['menu'];
            $harga = "";

            switch ($menu) {
                case "nasigoreng":
                $harga = "Rp 20.000";
                break;
                case "soto":
                $harga = "Rp 15.000";
                break;
                case "mieayam":
                $harga = "Rp 12.000";
                break;
                default:
                $harga = "Menu tidak tersedia";
            }

            echo "<h3>Anda memilih: $menu <br> Harga: $harga</h3>";
        }
    ?>

</body>
</html>
