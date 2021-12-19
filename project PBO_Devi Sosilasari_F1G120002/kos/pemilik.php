<?php 
session_start();
if (!isset($_SESSION["pemilik"])){
	header("Location:login.php");
	exit;
}
include "koneksi.php";
if (isset($_GET["id"])){
$id = $_GET["id"];
}else{
	$id="";
}
if (isset($_GET["username"])){
	$username = $_GET["username"];
}else{
	$username = "";
}
$q2=mysqli_query($koneksi,"SELECT * FROM pemilik_kos WHERE id = $id OR nama_pemilik = '$username'");
$q2a=mysqli_fetch_assoc($q2);
$id = $q2a["id"];
$q1=mysqli_query($koneksi,"SELECT * FROM kamar_kos where id_pemilik =$id");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pemilik</title>
</head>
<body>
<a href="crud/tambah/kamar.php?id=<?= $id; ?>">Tambah Kamar</a><br>
<h2>Data Pemilik</h2>
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
</table>
<a href="crud/ubah/pemilik.php?id=<?= $q2a['id']; ?>">ubah data pemilik</a>
<br>
<h2>Data Kamar Kos</h2>
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
			<a href="penyewa.php?id=<?= $q1a["id"]; ?>">Penyewa</a>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="crud/ubah/datakamar.php?id=<?= $q1a["id"]; ?>&idp=<?= $id; ?>&idp=<?= $id; ?>">Ubah</a>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="crud/hapus/kamar.php?id=<?= $q1a["id"]; ?>&idp=<?= $id; ?>" onclick="return confirm('Anda yakin ingin menghapus kamar ini?')">Hapus</a>
		</td>
	</tr>
</table>
<br>
<?php } ?>
</body>
</html>