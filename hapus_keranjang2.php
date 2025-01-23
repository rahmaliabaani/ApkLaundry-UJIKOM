<?php
include "koneksi.php";
error_reporting(E_ALL^E_NOTICE);

$kdp=$_GET['Kode_paket'];
mysqli_query($koneksi, "DELETE FROM `keranjang` WHERE `Kode_paket`='$kdp'");
header("location:keranjangg2.php");


?>