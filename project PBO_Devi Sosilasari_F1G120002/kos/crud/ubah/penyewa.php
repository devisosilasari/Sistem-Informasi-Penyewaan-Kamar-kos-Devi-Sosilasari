<?php 
require "../../koneksi.php";
$id = $_GET["id"];
$idk = $_GET["idk"];
$q1 = mysqli_query($koneksi, "SELECT * FROM penyewa_kos WHERE id_penyewa =$id");
$q1a = mysqli_fetch_assoc($q1);

if (isset($_POST["ubah"])){
	$nama_penyewa = $_POST["nama_penyewa"];
	$no_ktp = $_POST["no_ktp"];
	$no_hp = $_POST["no_hp"];
	$kesanggupan_membayar = $_POST["kesanggupan_membayar"];
	mysqli_query($koneksi,"UPDATE `penyewa_kos` SET `nama_penyewa` = '$nama_penyewa', `no_ktp` = '$no_ktp', `no_hp` = '$no_hp', `kesanggupan_membayar` = '$kesanggupan_membayar' WHERE `penyewa_kos`.`id_penyewa` = $id;");
	if(mysqli_affected_rows($koneksi)>0){
		echo "<script>alert('Data berhasil diubah!')
          document.location.href = '../../penyewa.php?id=$idk';
          </script>";
     }else{
          echo "<script>alert('Data gagal diubah!');
          document.location.href='../../penyewa.php?id=$idk';
          </script>";
	}
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ubah Data Penyewa</title>
 </head>
 <body>
 <h1>Ubah Data penyewa</h1>
<form action="" method="post">
	<ul>
		<li>
			<label for="nama_penyewa">Nama Penyewa:</label>
			<input type="text" name="nama_penyewa" id="nama_penyewa" value="<?= $q1a["nama_penyewa"]; ?>">
		</li>
		<li>
			<label for="no_ktp">No KTP:</label>
			<input type="text" name="no_ktp" id="no_ktp" value="<?= $q1a["no_ktp"]; ?>">
		</li>
		<li>
			<label for="no_hp">No Telepon:</label>
			<input type="text" name="no_hp" id="no_hp" value="<?= $q1a["no_hp"]; ?>">
		</li>
		<li>
			<label for="kesanggupan_membayar">Kesanggupan Membayar:</label>
			<input type="text" name="kesanggupan_membayar" id="kesanggupan_membayar" value="<?= $q1a["kesanggupan_membayar"]; ?>">
		</li>
		<li>
			<button type="submit" name="ubah">Ubah</button>
		</li>
	</ul>
</form>

 </body>
 </html>