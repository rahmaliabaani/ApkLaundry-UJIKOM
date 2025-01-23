<?php
include 'koneksi.php';
$kdp=$_POST['Kode_p'];
$kdo=$_POST['Kode_outlet'];
$nmp=$_POST['Nama_p'];
$user=$_POST['Username'];
$pass=$_POST['Password'];
$jk=$_POST['JK'];
$almt=$_POST['Alamat'];
$notel=$_POST['No_tlp'];
$jbtn=$_POST['Jabatan'];
$sts=$_POST['Status'];
$foto=$_POST['Foto'];

$save=mysqli_query($koneksi,"INSERT INTO pegawai VALUES ('$kdp','$kdo','$nmp','$user','$pass','$jk','$almt','$notel','$jbtn','$sts','$foto')");
mysqli_query($koneksi,"INSERT INTO user VALUES ('$kdp','$nmp','$user','$pass','$kdo','$jbtn','$sts')");
if ($save) {
  echo "<script>alert('Data berhasil tersimpan!');document.location='pegawai.php'</script>";
} else{
  // echo "<script>alert('Data gagal tersimpan!');document.location='pegawai.php'</script>";
}
?>