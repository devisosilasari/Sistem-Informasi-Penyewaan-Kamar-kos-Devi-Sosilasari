<?php 
include "koneksi.php";
$id = $_GET["id"];
$q1=mysqli_query($koneksi,"SELECT * FROM kamar_kos where id_pemilik =$id");
$q2=mysqli_query($koneksi,"SELECT nama_pemilik FROM pemilik_kos WHERE id = $id");
$q2a=mysqli_fetch_assoc($q2);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pemilik</title>
</head>
<body>
<a href="crud/tambah/kamar.php?id=<?= $id; ?>">Tambah Kamar</a><br>
<h2>Data Kamar Kos <?= $q2a["nama_pemilik"]; ?></h2>
<?php 
while ($q1a=mysqli_fetch_assoc($q1)) {
	$tersedia = $q1a["jumlah"] - $q1a["terpakai"];
 ?>
<table border="1" cellpadding="10">
	<tr>
		<th colspan="2">Kamar <?= $q1a["tipe_kamar"]; ?></th>
	</tr>
	<tr>
		<th>Fasilitas</th>
		<td><?= $q1a["fasilitas"]; ?></td>
	<tr>
		<th>Sistem Pembayaran</th>
	<td><?= $q1a["sistem_pembayaran"]; ?></td>
	</tr>
	<tr>
		<th>Harga</th>
		<td><?= $q1a["harga"]; ?></td>
	</tr>
	<tr>
		<th>Masa Kontrak</th>
		<td><?= $q1a["masa_kontrak"]; ?></td>
	</tr>
		<th>Kamar Tersedia</th>
		<td><?= $tersedia; ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="crud/ubah/datakamar.php?id=<?= $q1a["id"]; ?>">Ubah</a>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="penyewa.php?id=<?= $q1a["id"]; ?>">Penyewa</a>
		</td>
	</tr>
</table>
<br>
<?php } ?>
</body>
</html>