<?php
include "koneksi.php";
$notr=$_POST['No_trans'];
date_default_timezone_set("Asia/Jakarta");
$ambl=$_POST['Tgl_ambil'];
$sts=$_POST['Status_p'];
$pmb=$_POST['Pembayaran'];
$total=$_POST['Total'];
$tunai=$_POST['Tunai'];
$kembali=$_POST['Kembali'];

if ($tunai<$total) {
 	echo "<script>alert('Uang tunai kurang!');document.location='transaksidtg.php'</script>";	
} else {
	$update=mysqli_query($koneksi, "UPDATE `transaksi` SET `Tgl_ambil`='$ambl',`Status_p`='$sts',`Pembayaran`='$pmb' WHERE `No_trans`='$notr'");
header("location:transaksidtg.php");
}

?>