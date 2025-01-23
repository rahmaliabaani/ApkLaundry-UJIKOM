<?php
session_start();
include 'koneksi.php';

$user = mysqli_real_escape_string($koneksi,$_POST['Username']);
$password = mysqli_real_escape_string($koneksi,md5($_POST['Password']));

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$user' and Password='$password'");
$cek = mysqli_num_rows($login);

 if ($cek > 0) {

 	$data = mysqli_fetch_assoc($login);
 	
 	if ($data['Status']=="Tidak aktif") {
 		echo "<script>alert('Petugas sudah diblokir!');document.location='login.php'</script>";
 	}else{

 	if ($data['Jabatan']=="Admin") {
 		$_SESSION['Username'] = $user;
 		$_SESSION['Jabatan'] = "Admin";
 		echo "<script>alert('Selamat datang Admin!');document.location='index.php'</script>";

 	} else if($data['Jabatan']=="Kasir"){
 		$_SESSION['Username'] = $user;
 		$_SESSION['Jabatan'] = "Kasir";
 		echo "<script>alert('Selamat datang Kasir!');document.location='index2.php'</script>";

 	} else if($data['Jabatan']=="Pemilik"){
 		$_SESSION['Username'] = $user;
 		$_SESSION['Jabatan'] = "Pemilik";
 		echo "<script>alert('Selamat datang Pemilik!');document.location='index3.php'</script>";
 	}
 
	}
}

?>

<script type="text/javascript">
 		alert('Kode atau Password salah!');document.location='login.php';
</script>

