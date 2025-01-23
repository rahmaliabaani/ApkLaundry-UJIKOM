<?php
include 'koneksi.php';
$kdp=$_POST['Kode_pel'];
$nmp=$_POST['Nama_pel'];
$almt=$_POST['Alamat'];
$jk=$_POST['JK'];
$notel=$_POST['No_tlp'];

$save=mysqli_query($koneksi,"INSERT INTO member VALUES ('$kdp','$nmp','$almt','$jk','$notel')");
if ($save) {
  echo "<script>alert('Data berhasil tersimpan!');document.location='member.php'</script>";
} else{
  echo "<script>alert('Data gagal tersimpan!');document.location='member.php'</script>";
}
?>