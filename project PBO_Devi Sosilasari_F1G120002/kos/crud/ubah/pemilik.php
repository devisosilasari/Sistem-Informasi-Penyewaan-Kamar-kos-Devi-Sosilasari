<?php 
include "../../koneksi.php";
$id = $_GET["id"];
$q1 = mysqli_query($koneksi, "SELECT * FROM pemilik_kos WHERE id = $id");
$q1a = mysqli_fetch_assoc($q1);

if (isset($_POST["submit"])){
$nama_pemilik = $_POST["nama_pemilik"];
$alamat_kos = $_POST["alamat_kos"];
$no_hp = $_POST["no_hp"];
$foto_kos = $_POST["foto_kos"];
    mysqli_query($koneksi,"UPDATE `pemilik_kos` SET `nama_pemilik` = '$nama_pemilik', `alamat_kos` = '$alamat_kos', `no_hp` = '$no_hp' WHERE `pemilik_kos`.`id` = $id");
 $al = (isset($_GET["h"])) ? "../../admin.php" : "../../pemilik.php?id=$id";
    if (mysqli_affected_rows($koneksi)>0) {
          echo "<script>alert('Data berhasil diubah!')
          document.location.href = '$al';
          </script>";
     }else{
          echo "<script>alert('Data gagal diubah!');
          document.location.href='$al';
          </script>";
        }
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Ubah data pemilik</title>
 </head>
 <body>
 <h1>Ubah Data Pemilik</h1>
 <form action="" method="post">
<ul>
    <li>
    	<label for="nama_pemilik">Nama Pemilik:</label>
    	<input type="text" name="nama_pemilik" id="nama_pemilik" value="<?= $q1a['nama_pemilik']; ?>">
    </li>
    <li>
    	<label for="alamat_kos">Alamat Kos:</label>
    	<input type="text" name="alamat_kos" id="alamat_kos" value="<?= $q1a['alamat_kos']; ?>">
    </li>
    <li>
        <label for="no_hp">No Telepon:</label>
        <input type="text" name="no_hp" id="no_hp" value="<?= $q1a["no_hp"]; ?>">
    </li>
    <li>
    	<label for="foto_kos">Foto Kos:</label><br>
    	<img src="../../asset/img/<?= $q1a['foto_kos']; ?>" width =500>
    </li>
    <li>
        <button type="submit" name="submit">Ubah</button>
    </li>
</ul>
</form>
 </body>
 </html>