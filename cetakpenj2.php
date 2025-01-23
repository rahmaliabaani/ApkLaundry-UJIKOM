<!DOCTYPE html>
<html>
<head>
  <title>cetakpenj2</title>
</head>
<body>
    <center>
  
  
  <center><h1>Laporan Data Transaksi</h1>
    <?php echo "<img src='images/laundryk.png' />";?>
    <h4>Jalan.Kembar Margaasih Perum.Margaasih</h4></center>
  
  <br/>
  <table border="1" width="70%" style="border-collapse: collapse;">
 
                  <tr>
                      <th>No</th>
                      <th>No Trans</th>
                      <th>Tgl Datang</th>
                      <th>Tgl Ambil</th>
                      <th>Status</th>
                      <th>Kode Pegawai</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Biaya+</th>
                      <th>Diskon</th>
                      <th>Pajak</th>
                      <th>Total</th>
                      <th>Pembayaran</th>
                  </tr>
                  <?php 
    include 'koneksi.php';
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $data = mysqli_query($koneksi,"SELECT transaksi.No_trans, transaksi.Tgl_dtg, transaksi.Tgl_ambil, transaksi.Kode_p, paket.Nama_paket, paket.Harga, detail.Jumlah, transaksi.Status_p, transaksi.Biaya_tambahan, transaksi.Diskon, transaksi.Pajak, transaksi.Pembayaran, transaksi.Total FROM `transaksi` INNER JOIN pegawai ON transaksi.Kode_p = pegawai.Kode_p INNER JOIN detail ON transaksi.No_trans = detail.No_trans INNER JOIN paket ON detail.Kode_paket = paket.Kode_paket WHERE transaksi.Tgl_dtg BETWEEN '$tgl_awal' AND '$tgl_akhir'");
    $nomer=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $nomer++; ?></td> 
        <td><?php echo $d['No_trans']; ?></td>
        <td><?php echo $d['Tgl_dtg']; ?></td>
        <td><?php echo $d['Tgl_ambil']; ?></td>
        <td><?php echo $d['Status_p']; ?></td>
        <td><?php echo $d['Kode_p']; ?></td>
        <td><?php echo $d['Nama_paket']; ?></td>
        <td><?php echo number_format($d['Harga']); ?></td>
        <td><?php echo $d['Jumlah']; ?></td>
        <td><?php echo number_format($d['Biaya_tambahan']); ?></td>
        <td><?php echo $d['Diskon']; ?></td>
        <td><?php echo $d['Pajak']; ?></td>
        <td><?php echo number_format($d['Total']); ?></td>
        <td><?php echo $d['Pembayaran']; ?></td>

      </tr>
       <?php
     }
     ?>

     <?php
    include 'koneksi.php';
    $tgl = date('Y-m-d');
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $query = mysqli_query($koneksi, "SELECT SUM(Total) as Pendapatan FROM transaksi WHERE transaksi.Tgl_dtg BETWEEN '$tgl_awal' AND '$tgl_akhir'");
    while($q = mysqli_fetch_array($query)){
    ?>
    <tr><td colspan="14">Total Pendapatan : Rp. <?php echo number_format($q['Pendapatan']); ?></td></tr>
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