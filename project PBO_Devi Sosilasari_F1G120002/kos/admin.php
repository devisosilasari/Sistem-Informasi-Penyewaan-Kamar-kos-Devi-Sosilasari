<?php 
session_start();
if (!isset($_SESSION["admin"])){
	header("Location:login.php");
	exit;
}
include "koneksi.php";
$q2=mysqli_query($koneksi,"SELECT * FROM pemilik_kos");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pemilik</title>
</head>
<body>
<h2>Data Pemilik</h2>
<?php 
while ($q2a=mysqli_fetch_assoc($q2)) {
	$id_pemilik = $q2a["id"];
 ?>
<table border="1" cellpadding="10">
	<tr>
		<th colspan="2">Data <?= $q2a["nama_pemilik"]; ?></th>
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
	<tr>
		<td colspan="2"><a href="kamar.php?id=<?= $id_pemilik; ?>">Daftar Kamar Kos</a></td>
	</tr>
	<tr>
		<td colspan="2"><a href="crud/ubah/pemilik.php?id=<?= $id_pemilik; ?>&h=a">ubah</a></td>
	</tr>
</table>
<br>
<?php } ?>
</body>
</html>