<?php
include 'koneksi.php';
$notr=$_POST['No_trans'];
$kdp=$_POST['Kode_p'];
$kdo=$_POST['Kode_outlet'];
$nmp=$_POST['Nama_pel'];
date_default_timezone_set("Asia/Jakarta");
$dtg=date("Y-m-d");
$bts=$_POST['Batas_waktu'];
date_default_timezone_set("Asia/Jakarta");
$ambl=$_POST['Tgl_ambil'];
$biaya=$_POST['Biaya_tambahan'];
$dskn=$_POST['Diskon'];
$pjk=$_POST['Pajak'];
$tot=$_POST['Total'];
$sts=$_POST['Status_p'];
$pmb=$_POST['Pembayaran'];
mysqli_query($koneksi, "INSERT INTO detail SELECT * FROM keranjang");
mysqli_query($koneksi, "INSERT INTO `transaksi` VALUES ('$notr','$kdp','$kdo','$nmp','$dtg','$bts','$ambl','$biaya','$dskn','$pjk','$tot','$sts','$pmb')");

mysqli_query($koneksi, "DELETE FROM keranjang");

header("location:transaksidtg.php");
?>