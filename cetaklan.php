<!DOCTYPE html>
<html>
<head>
  <title>cetaklan</title>
</head>
<body>
    <center>
  
  
  <center><h1>Laporan Paket Laundry</h1>
    <?php echo "<img src='images/laundryk.png' />";?>
    <h4>Jalan.Kembar Margaasih Perum.Margaasih</h4></center>
  
  <br/>

  <table border="1" width="70%" style="border-collapse: collapse;">
                
                  <tr>
                    <th>No</th>
                      <th>Kode Paket</th>
                      <th>Kode Outlet</th>
                      <th>Jenis</th>
                      <th>Nama Paket</th>
                      <th>Harga</th>
                  </tr>
                  <?php 
    include 'koneksi.php';
    $tgl = date("Y-m-d");
    $data = mysqli_query($koneksi,"SELECT * FROM `paket`");
    $no=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['Kode_paket']; ?></td>
        <td><?php echo $d['Kode_outlet']; ?></td>
        <td><?php echo $d['Jenis']; ?></td>
        <td><?php echo $d['Nama_paket']; ?></td>
        <td><?php echo number_format($d['Harga']); ?></td>
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