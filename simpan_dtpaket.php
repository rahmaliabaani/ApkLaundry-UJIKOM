<?php
include 'koneksi.php';
$kdp=$_POST['Kode_paket'];
$kdo=$_POST['Kode_outlet'];
$jns=$_POST['Jenis'];
$nmp=$_POST['Nama_paket'];
$hrg=$_POST['Harga'];

$ambil = mysqli_query($koneksi, "SELECT * FROM paket where Nama_paket='$nmp' and Kode_outlet='$kdo'");
$cocok = $ambil->num_rows;
if ($cocok == 1) {
  	echo "<script>alert('Data paket sudah ada!');document.location='dtpaket.php'</script>";
} else {
  	$save=mysqli_query($koneksi,"INSERT INTO paket VALUES ('$kdp','$kdo','$jns','$nmp',$hrg)");
	if ($save) {
  		echo "<script>alert('Data berhasil tersimpan!');document.location='dtpaket.php'</script>";
	} else{
  		echo "<script>alert('Data gagal tersimpan!');document.location='dtpaket.php'</script>";
	}
}

?>