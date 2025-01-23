<!DOCTYPE html>
<html>
<head>
  <title>cetakpeg</title>
</head>
<body>
    <center>
  
  
  <center><h1>Laporan Data Pegawai</h1>
    <?php echo "<img src='images/laundryk.png' />";?>
    <h4>Jalan.Kembar Margaasih Perum.Margaasih</h4></center>
  
  <br/>

  <table border="1" width="70%" style="border-collapse: collapse;">
              
                  <tr>
                      <th>No</th>
                      <th>Kode Pegawai</th>
                      <th>Kode Outlet</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Foto</th>
                  </tr>
                  <?php 
    include 'koneksi.php';
    $no=1;
    $data = mysqli_query($koneksi,"SELECT * from pegawai where Status='Aktif'");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['Kode_p']; ?></td>
        <td><?php echo $d['Kode_outlet']; ?></td>
        <td><?php echo $d['Nama_p']; ?></td>
        <td><?php echo $d['JK']; ?></td>
        <td><?php echo $d['Alamat']; ?></td>
        <td><?php echo $d['No_tlp']; ?></td>
        <td><?php echo $d['Jabatan']; ?></td>
        <td><?php echo $d['Status']; ?></td>
        <td><img src='images/<?php echo $d['Foto'] ?>'></td>
    </tr>
    <?php
}
?>
 </table>
  
  <script>
    window.print();
  </script>
</center>
</body>
</html>