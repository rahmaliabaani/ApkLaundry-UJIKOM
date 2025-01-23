<?php
include "koneksi.php";
$kdp=$_POST['Kode_p'];
$kdo=$_POST['Kode_outlet'];
$nmp=$_POST['Nama_p'];
$jk=$_POST['JK'];
$almt=$_POST['Alamat'];
$notel=$_POST['No_tlp'];
$jbtn=$_POST['Jabatan'];
$sts=$_POST['Status'];
$foto=$_POST['Foto'];

$update=mysqli_query($koneksi, "UPDATE `pegawai` SET `Nama_p`='$nmp',`Kode_outlet`='$kdo',`JK`='$jk',`Alamat`='$almt',`No_tlp`='$notel',`Jabatan`='$jbtn',`Status`='$sts',`Foto`='$foto' WHERE `Kode_p`='$kdp'");
mysqli_query($koneksi, "UPDATE `user` SET `Nama_p`='$nmp',`Kode_outlet`='$kdo',`Jabatan`='$jbtn',`Status`='$sts' WHERE `Kode_p`='$kdp'");
if ($update) {
  echo "<script>alert('Data berhasil diubah!');document.location='pegawai.php'</script>";
} else{
  echo "<script>alert('Data gagal diubah!');document.location='pegawai.php'</script>";
}

?>