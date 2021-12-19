<?php 
include "../../koneksi.php";
$id = $_GET["id"];
$idk = $_GET["idk"];
$q1 = mysqli_query($koneksi, "DELETE FROM `penyewa_kos` WHERE `penyewa_kos`.`id_penyewa` = $id");
if (mysqli_affected_rows($koneksi)>0){
	$q2 = mysqli_query($koneksi,"SELECT * FROM kamar_kos WHERE id = $idk");
	$q2a = mysqli_fetch_assoc($q2);
    $terpakai = $q2a["terpakai"];
    if ($terpakai>0) {
     $terpakai--;
    }
     mysqli_query($koneksi,"UPDATE `kamar_kos` SET `terpakai` = '$terpakai' WHERE `kamar_kos`.`id` = $idk;");

	 echo "<script>alert('Data berhasil dihapus!')
          document.location.href = '../../penyewa.php?id=$idk';
          </script>";
     }else{
          echo "<script>alert('Data gagal dihapus!');
          document.location.href='../../penyewa.php?id=$idk';
          </script>";
     
     }

 ?>