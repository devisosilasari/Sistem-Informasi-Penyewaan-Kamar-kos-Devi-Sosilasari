<?php 
include "koneksi.php";
$id = $_GET["id"];
$q1 = mysqli_query($koneksi, "SELECT * FROM kamar_kos,pemilik_kos WHERE kamar_kos.id_pemilik=pemilik_kos.id  AND kamar_kos.id = $id");
$q1a = mysqli_fetch_assoc($q1);
if($q1a["jumlah"]==$q1a["terpakai"]){
	echo "<script>alert('KAMAR PENUH!  MAAF ANDA TIDAK BISA MENYEWA KAMAR INI!!! ');
          document.location.href='index.php';
          </script>";
}
if (isset($_POST["submit"])){
	$id_kamar = $id;
	$nama_penyewa = $_POST["nama_penyewa"];
	$no_ktp = $_POST["no_ktp"];
	$no_hp = $_POST["no_hp"];
	$kesanggupan_membayar = $_POST["kesanggupan_membayar"];
	$masa_kontrak = $q1a["masa_kontrak"];
	$status = "belum bayar";
	$q2 = mysqli_query($koneksi,"INSERT INTO `penyewa_kos` (`id_penyewa`, `id_kamar`, `masa_kontrak`, `nama_penyewa`, `no_ktp`, `no_hp`, `kesanggupan_membayar`, `status`) VALUES ('', '$id_kamar', '$masa_kontrak', '$nama_penyewa', '$no_ktp', '$no_hp', '$kesanggupan_membayar', '$status');");
	 if (mysqli_affected_rows($koneksi)>0) {
          echo "<script>alert('Permintaan Berhasil Diproses!')
          document.location.href = 'index.php';
          </script>";
     }else{
          echo "<script>alert('Permintaan Gagal Diproses!');
          document.location.href='index.php';
          </script>";
     
     }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Peraturan Kos</h3>
	<?= $q1a["peraturan_kos"]; ?>
<h3>Untuk Menyewa Kamar Kos Silahkan Isi data diri Anda</h3>
<form action="" method="post">
	<ul>
	    <li>
	    	<label for="nama_penyewa">Nama Penyewa:</label>
	    	<input type="text" name="nama_penyewa" id="nama_penyewa">
	    </li>
	    <li>
	    	<label for="no_ktp">No KTP:</label>
	    	<input type="text" name="no_ktp" id="no_ktp">
	    </li>
	    <li>
	    	<label for="no_hp">No Telepon:</label>
	    	<input type="text" name="no_hp" id="no_hp">
	    </li>
	    <li>
	    	<label for="kesanggupan_membayar">Kesanggupan Membayar:</label>
	    	<input type="text" name="kesanggupan_membayar" id="kesanggupan_membayar">
	    </li>
	    <li>
	    	<label for="masa_kontrak">Masa Kontrak :</label>
	    	<?= $q1a["masa_kontrak"]; ?> Rp <?= $q1a["harga"]; ?>
	    </li>
	</ul>
	<button type="submit" name="submit" onclick="return confirm('Anda akan menyewa kamar <?= $q1a["tipe_kamar"]; ?>? \nSilahkan lakukan pembayaran pada pemilik kos sebesar Rp <?= $q1a["harga"]; ?>. Kunci kamar kos akan diberikan oleh pemilik_kos setelah anda menyelesaikan proses pembayaran.')">Sewa Kamar Ini</button>
	<p>Setelah Mengklik "Sewa Kamar Ini" silahkan lakukan pembayaran pada pemilik kos sebesar Rp <?= $q1a["harga"]; ?><br>
		Kunci kamar kos akan diberikan oleh pemilik_kos setelah anda menyelesaikan proses pembayaran.<br>	
	Untuk melihat informasi pemilik kos silahkan klik link dibawah<br>	
	<a href="infopemilik.php?h=p&id=<?= $q1a["id_pemilik"]; ?>&idk=<?=$id; ?>">informasi pemilik kos</a></p>
</form>
<br>
<a href="index.php">Kembali</a>
</body>
</html>