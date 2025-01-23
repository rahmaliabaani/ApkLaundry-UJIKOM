<?php
include "koneksi.php";
error_reporting(E_ALL^E_NOTICE);

$kdp=$_GET['Kode_pel'];
mysqli_query($koneksi, "DELETE FROM `member` WHERE `Kode_pel`='$kdp'");
  echo "<script>alert('Data berhasil dihapus!');document.location='member2.php'</script>";

?>