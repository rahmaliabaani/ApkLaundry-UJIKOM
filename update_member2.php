<?php
include "koneksi.php";
$kdp=$_POST['Kode_pel'];
$nmp=$_POST['Nama_pel'];
$almt=$_POST['Alamat'];
$jk=$_POST['JK'];
$notel=$_POST['No_tlp'];

$update=mysqli_query($koneksi, "UPDATE `member` SET `Nama_pel`='$nmp',`Alamat`='$almt',`JK`='$jk',`No_tlp`='$notel' WHERE `Kode_pel`='$kdp'");

if ($update) {
  echo "<script>alert('Data berhasil diubah!');document.location='member2.php'</script>";
} else{
  echo "<script>alert('Data gagal diubah!');document.location='member2.php'</script>";
}

?>