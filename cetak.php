
<?php
include 'koneksi.php';

error_reporting(E_ALL^E_NOTICE);

$_SESSION['Kode_p'] = $_GET['Kode_p'];
$notr = $_GET['No_trans'];
?>
<center>
<table>
  <tr>
    <td>&nbsp &nbsp<?php echo "<img src='images/laundryk.png' />";?></td>
  </tr>
  <tr>
    <td>&nbsp &nbsp &nbsp &nbsp &nbspPerumahan Margaasih Indah</td>
  </tr>
  <tr>
    <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbspTelp.0813-9526-0912</td>
  </tr>
</table>
</center>

<td><hr></td>
<table>
  <?php
    $sql = mysqli_query($koneksi, "SELECT * FROM `transaksi` INNER JOIN pegawai ON transaksi.Kode_p=pegawai.Kode_p WHERE `No_trans`='$notr'");
    $tampil = mysqli_fetch_array($sql);
  ?>

  <tr>
    <td>No Transaksi</td>
    <td>:    <?php echo $tampil['No_trans']; ?></td>
  </tr>
  <tr>
    <td>Tanggal Datang</td>
    <td>:    <?php echo $tampil['Tgl_dtg']; ?></td>
  </tr>
  <tr>
    <td>Tanggal Ambil</td>
    <td>:    <?php echo $tampil['Tgl_ambil']; ?></td>
  </tr>
  <tr>
    <td>Pegawai</td>
    <td>:    <?php echo $tampil['Kode_p']; ?> | <?php echo $tampil['Username']; ?></td>
  </tr>
  <tr>
    <td>Nama Pelanggan</td>
    <td>:    <?php echo $tampil['Nama_pel']; ?></td>
  </tr>
  <tr>
    <td>Pembayaran</td>
    <td>:    <?php echo $tampil['Pembayaran']; ?></td>
  </tr>
  <td><hr></td>
  
  <?php
    $sql2 = mysqli_query($koneksi, "SELECT detail.Jenis, detail.Nama_paket, detail.Harga, detail.Jumlah, detail.Subtotal, transaksi.Total, transaksi.Diskon, transaksi.Pajak, transaksi.Biaya_tambahan FROM transaksi, detail, paket WHERE transaksi.No_trans=detail.No_trans AND detail.Kode_paket=paket.Kode_paket AND transaksi.No_trans='$notr'");
    
    while ($tampil2 = mysqli_fetch_array($sql2)) {
      
  ?>
  
  <tr>
    <td><?php echo $tampil2['Nama_paket'] ?> (<?php echo $tampil2['Jenis']; ?>)</td>
    <td>&nbsp <?php echo number_format($tampil2['Harga']) ?> x <?php echo number_format($tampil2['Jumlah']); ?> &nbsp &nbsp <?php echo number_format($tampil2['Subtotal']); ?>,-</td></tr>
    

  <?php
    $diskon = $tampil2['Diskon'];
    $pajak = $tampil2['Pajak'];
    $biaya = $tampil2['Biaya_tambahan'];
    $total = $tampil2['Total'];

}
  ?>

  <tr>
    <td><hr></td>
  </tr>
  <tr>
    <th colspan="1">Diskon</th>
    <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo number_format($diskon); ?>%</td>
  </tr>
  <tr>
    <th colspan="1">Pajak </th>
    <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo number_format($pajak); ?>%</td>
  </tr>
  <tr>
    <th colspan="1">Biaya Tambahan</th>
    <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo number_format($biaya); ?>,-</td>
  </tr>
  <tr>
    <th colspan="1">Total</th>
    <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <?php echo number_format($total); ?>,-</td>
  </tr>

  

</table>
<br/>
<!-- <td>--------------------------------------------------------------------</td> -->
<td><hr></td>
<center>
<table>
  <tr>
    <td>&nbsp &nbsp---Terimakasih---</td>
  </tr>
</table>
</center>
<table>
  <tr>
    <td>Perhatian :</td>
  </tr>
  <tr>
    <td>1. Pengambilan barang harus dengan bon</td>
  </tr>
  <tr>
    <td>2. Barang tidak diambil 1bulan/hilang bukan tanggung jawab kami</td>
  </tr>
  <tr>
    <td>3. Barang luntur diluar tanggung jawab kami</td>
  </tr>
  <tr>
    <td>4. Hak klaim berlaku 24 jam setelah barang diambil</td>
  </tr>
  <tr>
    <td>5. Konsumen yang telah mencuci pada kami dianggap setuju dengan ketentuan-ketentuan diatas.</td>
  </tr>
  
</table>

<br/>