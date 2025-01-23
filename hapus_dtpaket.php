<?php
include "koneksi.php";
error_reporting(E_ALL^E_NOTICE);

$kdp=$_GET['Kode_paket'];
mysqli_query($koneksi, "DELETE FROM `paket` WHERE `Kode_paket`='$kdp'");
  echo "<script>alert('Data berhasil dihapus!');document.location='dtpaket.php'</script>";

?>