<?php 
include "../../koneksi.php";
     $id = $_GET["id"];
$query = mysqli_query($koneksi,"SELECT * FROM kamar_kos WHERE id=$id");
$q = mysqli_fetch_assoc($query);
          if (isset($_GET["idp"])){
          $ida = "pemilik.php?id=".$_GET["idp"];
          }else{
          $ida = "admin.php?id=".$q["id_pemilik"];
          }
if (isset($_POST["submit"])){
     $tipe_kamar = $_POST["tipe_kamar"];
     $fasilitas = $_POST["fasilitas"];
     $sistem_pembayaran = $_POST["sistem_pembayaran"];
     $harga = $_POST["harga"];
     $masa_kontrak = $_POST["masa_kontrak"];
     $jumlah = $_POST["jumlah"];
     mysqli_query($koneksi, "UPDATE `kamar_kos` SET `tipe_kamar` = '$tipe_kamar', `fasilitas` = '$fasilitas', `sistem_pembayaran` = '$sistem_pembayaran', `harga` = '$harga', `masa_kontrak` = '$masa_kontrak', `jumlah` = '$jumlah' WHERE `kamar_kos`.`id` = $id;");
     if (mysqli_affected_rows($koneksi)>0) {
          echo "<script>alert('Data berhasil diubah!')
          document.location.href = '../../$ida';
          </script>";
     }else{
          echo "<script>alert('Data gagal diubah!');
          document.location.href = '../../$ida';
          </script>";
     
     }
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ubah Kamar</title>
 </head>
 <body>
 <h1>Ubah Kamar</h1>
 <form action="" method="post">
 <ul>
     <li>
     	<label for="tipe_kamar">Tipe Kamar:</label>
     	<input type="text" name="tipe_kamar" id="tipe_kamar" value="<?= $q["tipe_kamar"]; ?>">
     </li>
     <li>
     	<label for="fasilitas">Fasilitas:</label>
     	<input type="text" name="fasilitas" id="fasilitas" value="<?= $q["fasilitas"]; ?>">
     </li>
     <li>
     	<label for="sistem_pembayaran">Sistem Pembayaran:</label>
     	<input type="text" name="sistem_pembayaran" id="sistem_pembayaran" value="<?= $q["sistem_pembayaran"]; ?>">
     </li>
     <li>
     	<label for="harga">Harga:</label>
     	<input type="text" name="harga" id="harga" value="<?= $q["harga"]; ?>">
     </li>
     <li>
     	<label for="masa_kontrak">Masa Kontrak:</label>
     	<input type="text" name="masa_kontrak" id="masa_kontrak" value="<?= $q["masa_kontrak"]; ?>">
     </li>
     <li>
     	<label for="jumlah">Jumlah:</label>
     	<input type="text" name="jumlah" id="jumlah" value="<?= $q["jumlah"]; ?>">
     </li>
     <li>
     	<button type="submit" name="submit">ubah Data Kos</button>
     </li>
 </ul>
 </form>
 </body>
 </html>