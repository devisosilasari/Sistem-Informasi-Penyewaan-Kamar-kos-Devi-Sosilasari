<?php 
include "koneksi.php";
$id = $_GET["id"];
$q1 = mysqli_query($koneksi,"SELECT * FROM penyewa_kos,kamar_kos WHERE penyewa_kos.id_kamar = kamar_kos.id AND id_kamar = $id");
$q1a = mysqli_fetch_assoc($q1);

if (!isset($q1a)){
     echo "Tidak ada penyewa";
     die;
}

if (isset($_POST["konfirmasi"])){
	$id_penyewa = $_POST["id_penyewa"];
     $id_kamar = $q1a["id_kamar"];
     $terpakai = $q1a["terpakai"];
     $terpakai++;
	mysqli_query($koneksi,"UPDATE `penyewa_kos` SET `status` = 'sudah bayar' WHERE `penyewa_kos`.`id_penyewa` = $id_penyewa;");
     if (mysqli_affected_rows($koneksi)>0) {
     	mysqli_query($koneksi,"UPDATE `kamar_kos` SET `terpakai` = '$terpakai' WHERE `kamar_kos`.`id` = $id_kamar;");
          echo "<script>alert('Berhasil Konfirmasi!')
          document.location.href = 'penyewa.php?id=$id';
          </script>";
     }else{
          echo "<script>alert('Gagal Konfirmasi!');
          document.location.href='penyewa.php?id=$id';
          </script>";
     
     }
}

?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Permintaan Sewa</title>
 </head>
 <body>
 <table border="1" cellpadding="10">
 	<tr>
 		<th colspan="6">Kamar <?= $q1a["tipe_kamar"]; ?></th>
 	</tr>
 	<tr>
 		<th>Nama Penyewa </th>
 		<th>No KTP</th>
 		<th>No Telepon</th>
 		<th>Kesanggupan Membayar</th>
 		<th>Status</th>
          <th></th>
 	</tr>
 	<?php 
foreach ($q1 as $d) {?>
 	<tr>
 		<td><?= $d["nama_penyewa"]; ?></td>
 		<td><?= $d["no_ktp"]; ?></td>
 		<td><?= $d["no_hp"]; ?></td>
 		<td><?= $d["kesanggupan_membayar"]; ?></td>
 	<?php 
 		if($d["status"]=="sudah bayar"){?>
          <td>Sudah Bayar</td>
     <?php }else{?>
 		  <form action="" method="post">
 		       <input type="hidden" name="id_penyewa" value="<?= $d["id_penyewa"]; ?>">
 		<td>
               <button type="submit" name="konfirmasi" onclick="return confirm('Klik Ok jika penyewa telah menyelesaikan proses pembayaran dan jangan lupa berikan kunci kamarnya Hahahhhh!!!')">
                    Konfirmasi Pembayaran
               </button>
          </td>
 		</form>
          <?php } ?>	
 		<td>
             <a href="crud/ubah/penyewa.php?id=<?= $d["id_penyewa"]; ?>&idk=<?= $id; ?>">Ubah</a>  
             <a href="crud/hapus/penyewa.php?id=<?= $d["id_penyewa"]; ?>&idk=<?= $id; ?>" onclick="return confirm('Anda yakin ingin menghapus Penyewa ini?')">Hapus</a>  
          </td>
 	</tr>
 <?php } ?>
 </table>
 </body>
 </html>