<?php
include "koneksi.php";
$kdp=$_POST['Kode_paket'];
$kdo=$_POST['Kode_outlet'];
$jns=$_POST['Jenis'];
$nmp=$_POST['Nama_paket'];
$hrg=$_POST['Harga'];

$update=mysqli_query($koneksi, "UPDATE `paket` SET `Kode_outlet`='$kdo',`Jenis`='$jns',`Nama_paket`='$nmp',`Harga`=$hrg WHERE `Kode_paket`='$kdp'");

if ($update) {
  echo "<script>alert('Data berhasil diubah!');document.location='dtpaket.php'</script>";
} else{
  echo "<script>alert('Data gagal diubah!');document.location='dtpaket.php'</script>";
}

?>