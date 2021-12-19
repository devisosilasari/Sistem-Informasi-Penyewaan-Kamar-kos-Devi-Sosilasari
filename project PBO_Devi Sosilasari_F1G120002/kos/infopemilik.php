<?php 
include "koneksi.php";
$id = $_GET["id"];
$q2=mysqli_query($koneksi,"SELECT * FROM pemilik_kos WHERE id = $id");
$q2a=mysqli_fetch_assoc($q2);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Info Pemilik </title>
</head>
<body>
<table border="1" cellpadding="10">
	<tr>
		<th colspan="2"><h3>Data Pemilik Kamar Kos</h3></th>
	</tr>
	<tr>
		<th>Nama Pemilik</th>
		<td><?= $q2a["nama_pemilik"]; ?></td>
	</tr>
	<tr>
		<th>Alamat Kos</th>
		<td><?= $q2a["alamat_kos"]; ?></td>
	</tr>
	<tr>
		<th>No Telepon</th>
		<td><?= $q2a["no_hp"]; ?></td>
	</tr>
	<tr>
		<th>Gambar Kos</th>
		<td><img src="asset/img/<?= $q2a["foto_kos"]; ?>" width = 200><br><a href="asset/img/<?= $q2a["foto_kos"]; ?>">lihat</a></td>
	</tr>
</table>
	<?php 
	if (isset($_GET["idk"])){
		$idk = $_GET["idk"];
	}
	$hal = (isset($_GET["h"])) ? "permintaansewa.php?id=$idk" : "index.php";
	 ?>
	<a href="<?= $hal; ?>">Kembali</a>
</body>
</html>