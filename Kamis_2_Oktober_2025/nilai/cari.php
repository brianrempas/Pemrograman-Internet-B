<?php
include "../koneksi.php";
$id = $_GET['id'];
$keyword = $_GET['keyword'];
$result = $conn->query("SELECT * FROM nilai 
	WHERE mahasiswa_id=$id 
	AND mata_kuliah LIKE '%$keyword%'");
$data = [];
while ($row = $result->fetch_assoc()) {
	$data[] = $row;
}
echo json_encode($data);
?>