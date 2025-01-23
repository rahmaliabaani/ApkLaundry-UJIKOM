<!DOCTYPE html>
<html>
<head>
  <title>cetakout</title>
</head>
<body>
    <center>
  
  
  <center><h1>Laporan Data Outlet</h1>
    <?php echo "<img src='images/laundryk.png' />";?>
    <h4>Jalan.Kembar Margaasih Perum.Margaasih</h4></center>
  
  <br/>
  <table border="1" width="70%" style="border-collapse: collapse;">
 
                  <tr>
                    <th>No</th>
                      <th>Kode Outlet</th>
                      <th>Nama Outlet</th>
                      <th>Alamat</th>
                      <th>No Telepon</th>
                  </tr>
                  <?php 
    include 'koneksi.php';
    $tgl = date("Y-m-d");
    $data = mysqli_query($koneksi,"SELECT * FROM `outlet`");
    $no=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['Kode_outlet']; ?></td>
        <td><?php echo $d['Nama_outlet']; ?></td>
        <td><?php echo $d['Alamat']; ?></td>
        <td><?php echo $d['No_tlp']; ?></td>
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