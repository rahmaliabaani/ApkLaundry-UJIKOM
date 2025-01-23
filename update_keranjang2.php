<?php
include "koneksi.php";
$kdp=$_POST['Kode_paket'];
$nmp=$_POST['Nama_pel'];
$sts=$_POST['Status_p'];
$jmlh=$_POST['Jumlah'];
$sub=$_POST['Subtotal'];
$pmb=$_POST['Pembayaran'];

$update=mysqli_query($koneksi, "UPDATE `keranjang` SET `Nama_pel`='$nmp',`Status_p`='$sts',`Jumlah`='$jmlh',`Subtotal`='$sub',`Pembayaran`='$pmb' WHERE `Kode_paket`='$kdp'");
header("location:keranjangg2.php");
?>