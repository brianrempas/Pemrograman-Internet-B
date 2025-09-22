<!DOCTYPE html>
<html>
<head>
	<title>Form Ucapan</title>
</head>
<body>

	<h2>Form Ucapan</h2>

	<form method="POST">
		Name: <input type="text" name="name"><br>
		<input type="submit">
	</form>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name = $_POST['name'];
			echo "<h3>Halo, " . $name . " selamat belajar PHP!</h3>";

		}
	?>

</body>
</html>
