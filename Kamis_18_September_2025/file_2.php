<!DOCTYPE html>
<html>
<head>
    <title>Daftar Harga Barang</title>
</head>
<body>
    <h2>Daftar Harga Barang</h2>
    <?php
    $barang = [
        "Laptop"      => 12000000,
        "Smartphone"  => 4500000,
        "Headset"     => 350000,
        "Keyboard"    => 250000,
        "Flashdisk"   => 100000
    ];
    ?>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th align="left">Nama Barang</th>
            <th align="right">Harga (Rp)</th>
        </tr>
        <?php foreach ($barang as $nama => $harga): ?>
            <tr>
                <td><?= $nama ?></td>
                <td align="right"><?= number_format($harga,0,',','.') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
