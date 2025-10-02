<?php include "../koneksi.php"; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>
<h3>Cari Nilai - <?php echo $data['nama']; ?> (<?php echo $data['nim']; ?>)</h3>

<input type="text" id="keyword" placeholder="Cari nilai...">
<table border="1" cellpadding="5">
	<thead>
		<tr>
			<th>ID</th>
			<th>Mata Kuliah</th>
			<th>SKS</th>
			<th>Nilai Angka</th>
			<th>Nilai Huruf</th>
		</tr>
	</thead>
	<tbody id="hasil"></tbody>
</table>
<script>
	let mhsId = <?= $id ?>;

	document.querySelector("#keyword").oninput = function() {
		let key = this.value;
		fetch("cari.php?id=" + mhsId + "&keyword=" + key)
		.then(res => res.json())
		.then(data => {
			let isi = "";
			data.forEach(n => {
				isi += `<tr>
              <td>${n.id}</td>
              <td>${n.mata_kuliah}</td>
              <td>${n.sks}</td>
              <td>${n.nilai_angka}</td>
              <td>${n.nilai_huruf}</td>
			</tr>`;
		});
			document.querySelector("#hasil").innerHTML = isi;
		});
	};
</script>

<?php
echo "<a href='nilai.php?id=$id'>Kembali</a>";
?>