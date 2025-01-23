<?php
include "koneksi.php";
error_reporting(E_ALL^E_NOTICE);

$kdo=$_GET['Kode_outlet'];
mysqli_query($koneksi, "DELETE FROM `outlet` WHERE `Kode_outlet`='$kdo'");
  echo "<script>alert('Data berhasil dihapus!');document.location='dtoutlet.php'</script>";

?>