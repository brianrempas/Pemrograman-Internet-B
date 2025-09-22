<!DOCTYPE html>
<html>
<head><title>Daftar Mahasiswa</title></head>
<body>
	<h2>Daftar Mahasiswa</h2>
	<?php
	$mahasiswa = [
		"2405551179" => "Brian Salomo Rempas",
		"2405551180" => "Siti Nurhaliza",
		"2405551181" => "Agus Santoso",
		"2405551182" => "Horang Kaya",
		"2405551183" => "Made Putra"
	];

	foreach ($mahasiswa as $nim => $nama) {
		echo "NIM: $nim - Nama: $nama <br>";
	}
	?>
</body>
</html>
