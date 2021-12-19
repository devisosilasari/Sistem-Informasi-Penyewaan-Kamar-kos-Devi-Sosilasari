<?php 
include "koneksi.php";
$q1 = mysqli_query($koneksi,"SELECT * FROM kamar_kos");

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sistem Penyewaan Kamar Kos</title>
 </head>
 <body>
  	<button type="submit" name="login"><a href="login.php">Login</a></button>
<h2>Daftar Kamar Kos</h2>
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
	<tr>
		<th>Kamar Tersedia</th>
		<td><?= $tersedia; ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="infopemilik.php?id=<?= $q1a["id_pemilik"]; ?>">Informasi Pemilik</a>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a href="permintaansewa.php?id=<?= $q1a["id"]; ?>">Pilih</a></td>
	</tr>
</table>
<br>
<?php } ?>
 </body>
 </html>