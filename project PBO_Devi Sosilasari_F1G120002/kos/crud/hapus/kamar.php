<?php 
include "../../koneksi.php";
$id = $_GET["id"];
$idp = $_GET["idp"];
$q1 = mysqli_query($koneksi, "DELETE FROM `kamar_kos` WHERE `kamar_kos`.`id` = $id");
if (mysqli_affected_rows($koneksi)>0){
	 echo "<script>alert('Data berhasil dihapus!')
          document.location.href = '../../pemilik.php?id=$idp';
          </script>";
     }else{
          echo "<script>alert('Data gagal dihapus!');
          document.location.href='../../pemilik.php?id=$idp';
          </script>";
     
     }

 ?>