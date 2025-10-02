<input type="text" id="keyword" placeholder="Cari mahasiswa...">
<table border="1">
	<thead><tr><th>ID</th><th>NIM</th><th>Nama</th><th>Prodi</th></tr></thead>
	<tbody id="hasil"></tbody>
</table>
<script>
	document.querySelector("#keyword").oninput = function() {
		let key = this.value;
		fetch("cari.php?keyword=" + key)
		.then(res => res.json())
		.then(data => {
			let isi = "";
			data.forEach(m => {
				isi += `<tr>
 <td>${m.id}</td>
<td>${m.nim}</td>
<td>${m.nama}</td>
<td>${m.prodi}</td>
			</tr>`;
		});
			document.querySelector("#hasil").innerHTML = isi;
		});
	};
</script>

<a href="index.php">Kembali</a>