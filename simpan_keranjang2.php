<?php

include 'koneksi.php';
$no=$_POST['No_trans'];
$kdp=$_POST['Kode_paket'];
date_default_timezone_set("Asia/Jakarta");
$tgl=date("Y-m-d");
$nmpel=$_POST['Nama_pel'];
$jns=$_POST['Jenis'];
$nmp=$_POST['Nama_paket'];
$sts=$_POST['Status_p'];
$hrg=$_POST['Harga'];
$brt=$_POST['Jumlah'];
$sub=$_POST['Subtotal'];
$byr=$_POST['Pembayaran'];

$ambil=mysqli_query($koneksi, "SELECT * FROM keranjang WHERE Kode_paket='$kdp'");
$cocok= $ambil->num_rows;
if ($cocok==1) {
 	echo "<script>alert('Paket cucian sudah ada!');document.location='keranjangg.php'</script>";	
} else {
	mysqli_query($koneksi,"INSERT INTO keranjang VALUES ('$no','$kdp','$tgl','$nmpel','$jns','$nmp','$sts',$hrg,$brt,$sub,'$byr')");
	header("location:keranjangg.php");
}
?>