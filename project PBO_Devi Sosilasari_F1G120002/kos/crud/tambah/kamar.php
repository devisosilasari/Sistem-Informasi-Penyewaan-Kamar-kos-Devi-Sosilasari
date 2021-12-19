<?php 
include "../../koneksi.php";
$id = $_GET["id"];
if (isset($_POST["submit"])){
     $tipe_kamar = $_POST["tipe_kamar"];
     $fasilitas = $_POST["fasilitas"];
     $sistem_pembayaran = $_POST["sistem_pembayaran"];
     $harga = $_POST["harga"];
     $masa_kontrak = $_POST["masa_kontrak"];
     $jumlah = $_POST["jumlah"];
     mysqli_query($koneksi, "INSERT INTO `kamar_kos` (`id`, `id_pemilik`, `tipe_kamar`, `fasilitas`, `sistem_pembayaran`, `harga`, `masa_kontrak`, `jumlah`, `terpakai`) VALUES ('', '$id', '$tipe_kamar', '$fasilitas', '$sistem_pembayaran', '$harga', '$masa_kontrak', '$jumlah', '0');");
     if (mysqli_affected_rows($koneksi)>0) {
          echo "<script>alert('Data berhasil ditambahkan!')
          document.location.href = '../../pemilik.php?id=$id';
          </script>";
     }else{
          echo "<script>alert('Data gagal ditambahkan!');
          document.location.href='../../pemilik.php?id=$id';
          </script>";
     
     }
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tambah Kamar</title>
 </head>
 <body>
 <h1>Tambah Kamar</h1>
 <form action="" method="post">
 <ul>
     <li>
     	<label for="tipe_kamar">Tipe Kamar:</label>
     	<input type="text" name="tipe_kamar" id="tipe_kamar">
     </li>
     <li>
     	<label for="fasilitas">Fasilitas:</label>
     	<input type="text" name="fasilitas" id="fasilitas">
     </li>
     <li>
     	<label for="sistem_pembayaran">Sistem Pembayaran:</label>
     	<input type="text" name="sistem_pembayaran" id="sistem_pembayaran">
     </li>
     <li>
     	<label for="harga">Harga:</label>
     	<input type="text" name="harga" id="harga">
     </li>
     <li>
     	<label for="masa_kontrak">Masa Kontrak:</label>
     	<input type="text" name="masa_kontrak" id="masa_kontrak">
     </li>
     <li>
     	<label for="jumlah">Jumlah:</label>
     	<input type="text" name="jumlah" id="jumlah">
     </li>
     <li>
     	<button type="submit" name="submit">Tambah Data Kos</button>
     </li>
 </ul>
 </form>
 </body>
 </html>