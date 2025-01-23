<?php
include "koneksi.php";
error_reporting(E_ALL^E_NOTICE);

$kdp=$_GET['Kode_p'];
$sts=$_GET['Status'];
mysqli_query($koneksi, "UPDATE `pegawai` SET `Status`='Tidak aktif' WHERE `Kode_p`='$kdp'");
mysqli_query($koneksi, "UPDATE `user` SET `Status`='Tidak aktif' WHERE `Kode_p`='$kdp'");
  echo "<script>alert('Data berhasil diblokir!');document.location='pegawai.php'</script>";

?>