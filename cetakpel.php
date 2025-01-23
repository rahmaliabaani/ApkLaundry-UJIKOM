<!DOCTYPE html>
<html>
<head>
  <title>cetakpel</title>
</head>
<body>
    <center>
  
  
  <center><h1>Laporan Data Pelanggan</h1>
    <?php echo "<img src='images/laundryk.png' />";?>
    <h4>Jalan.Kembar Margaasih Perum.Margaasih</h4></center>
  
  <br/>
  <table border="1" width="70%" style="border-collapse: collapse;">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode Member</th>
                      <th>Nama Member</th>
                      <th>Alamat</th>
                      <th>Jenis Kelamin</th>
                      <th>No Telepon</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
    include 'koneksi.php';
    $no=1;
    $data = mysqli_query($koneksi,"SELECT * from member");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['Kode_pel']; ?></td>
        <td><?php echo $d['Nama_pel']; ?></td>
        <td><?php echo $d['Alamat']; ?></td>
        <td><?php echo $d['JK']; ?></td>
        <td><?php echo $d['No_tlp']; ?></td>
    </tr>
    <?php
}
?>
 </tbody>
 </table>
  <script>
    window.print();
  </script>
</center>
</body>
</html>