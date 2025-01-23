<?php
include 'koneksi.php';
$kdo=$_POST['Kode_outlet'];
$nmo=$_POST['Nama_outlet'];
$almt=$_POST['Alamat'];
$notel=$_POST['No_tlp'];

$save=mysqli_query($koneksi,"INSERT INTO outlet VALUES ('$kdo','$nmo','$almt','$notel')");
if ($save) {
  echo "<script>alert('Data berhasil tersimpan!');document.location='dtoutlet.php'</script>";
} else{
  echo "<script>alert('Data gagal tersimpan!');document.location='dtoutlet.php'</script>";
}
?>