<?php
include "koneksi.php";
$kdo=$_POST['Kode_outlet'];
$nmo=$_POST['Nama_outlet'];
$almt=$_POST['Alamat'];
$notel=$_POST['No_tlp'];

$update=mysqli_query($koneksi, "UPDATE `outlet` SET `Nama_outlet`='$nmo',`Alamat`='$almt',`No_tlp`='$notel' WHERE `Kode_outlet`='$kdo'");

if ($update) {
  echo "<script>alert('Data berhasil diubah!');document.location='dtoutlet.php'</script>";
} else{
  echo "<script>alert('Data gagal diubah!');document.location='dtoutlet.php'</script>";
}

?>