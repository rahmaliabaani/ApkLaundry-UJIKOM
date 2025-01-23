<!DOCTYPE HTML>
<html>
<head>
<title>RezLaundry</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--//skycons-icons-->
</head>
<body>
<?php
    session_start();
    if ($_SESSION['Jabatan']=="") {
        header("location:index.php?pesan=gagal");
    }
    ?>  
<div class="page-container">  
   <div class="left-content">
     <div class="mother-grid-inner">
            <!--header start here-->
        <div class="header-main">
          <div class="header-left">
              <div class="logo-name">
                   <a href="index.html"> <h1>RezLaundry</h1></a>                
              </div>
              
              <div class="clearfix"> </div>
             </div>
             <div class="header-right">
              

              <!--notification menu end -->
              <?php
                    include 'koneksi.php';
                    $user = $_SESSION['Username'];
                    $query = mysqli_query($koneksi, "SELECT Foto FROM pegawai WHERE Username='$user'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
              <div class="profile_details">   
                <ul>
                  <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <div class="profile_img"> 
                        <span class="prfil-img"><?php echo "<img src='images/$data[Foto]' width='55' height='55' class='img-circle'/> ";?> </span> 
                        <div class="user-name">
                          <p><?php echo $_SESSION['Username']; ?></p> 
                                      <span><?php echo $_SESSION['Jabatan']; ?></span> |
            <?php
            include 'koneksi.php';
            $user = $_SESSION['Username'];
            $query=mysqli_query($koneksi,"SELECT Kode_outlet FROM pegawai WHERE Username='$user'");
            while ($d = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <span><?php echo $d['Kode_outlet'];?></span>
              </tr>
              <?php } ?>
                        </div>
                        <i class="fa fa-angle-down lnr"></i>
                        <i class="fa fa-angle-up lnr"></i>
                        <div class="clearfix"></div>  
                      </div>  
                    </a>
                    <?php } ?>
                    <ul class="dropdown-menu drp-mnu"> 
                      <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Keluar</a> </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="clearfix"> </div>       
            </div>
             <div class="clearfix"> </div>  
        </div>
<!--heder end here-->
<!-- script-for sticky-nav -->
    <script>
    $(document).ready(function() {
       var navoffeset=$(".header-main").offset().top;
       $(window).scroll(function(){
        var scrollpos=$(window).scrollTop(); 
        if(scrollpos >=navoffeset){
          $(".header-main").addClass("fixed");
        }else{
          $(".header-main").removeClass("fixed");
        }
       });
       
    });
    </script>
    <!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
    <div class="blank">
      <center><h2><font face="Cambria Math">Laporan Data Transaksi</font></h2></center>

<font face="Cambria Math">
  <div class="row">
    <div class="col-md-2">
  <form action="cetakpenj2.php">
        <a data-toggle="modal" data-target="#smallModal1">
        <button class="btn btn-success"><i class="fa fa-print fa-fw"></i> Cetak Per-Tanggal</button>
        </a>
        </form></div>
  <form action="cetakpenj.php">
        <a data-toggle="modal" data-target="#smallModal">
        <button class="btn btn-warning"><i class="fa fa-print fa-fw"></i> Cetak Per-Status</button>
        </a>
        </form></div>
        <br>
 <table class="table table-head">
                  <tr>
                      <th>No</th>
                      <th>No Trans</th>
                      <th>Tgl Datang</th>
                      <th>Tgl Ambil</th>
                      <th>Status</th>
                      <th>Kode P</th>
                      <th>Nama B</th>
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
    $tgl= date("Y-m-d");
    $data = mysqli_query($koneksi,"SELECT transaksi.No_trans, transaksi.Tgl_dtg, transaksi.Tgl_ambil, transaksi.Kode_p, paket.Nama_paket, paket.Harga, detail.Jumlah, transaksi.Status_p, transaksi.Biaya_tambahan, transaksi.Diskon, transaksi.Pajak, transaksi.Pembayaran, transaksi.Total FROM `transaksi` INNER JOIN pegawai ON transaksi.Kode_p = pegawai.Kode_p INNER JOIN detail ON transaksi.No_trans = detail.No_trans INNER JOIN paket ON detail.Kode_paket = paket.Kode_paket WHERE transaksi.Tgl_dtg='$tgl'");
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
    $query = mysqli_query($koneksi, "SELECT SUM(Total) as Pendapatan FROM transaksi WHERE transaksi.Tgl_dtg='$tgl'");
    while($q = mysqli_fetch_array($query)){
    ?>
    <tr><td colspan="14">Total Pendapatan : Rp. <?php echo number_format($q['Pendapatan']); ?></td></tr>
    <?php
}
?>
      </table>

        
        </font>
      
    </div>
</div>
<!--inner block end here-->

</div>
</div>
<!-- cetakpenj modal -->
<font face="Cambria Math">
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Transaksi</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="cetakpenj.php">

                <label for="">Status</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="Status_p" class="form-control">
                    </div>
                </div>

                <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control">
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control">
                    </div>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Cetak</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div> 
</font>
<!-- cetakpenj modal -->
<font face="Cambria Math">
<div class="modal fade" id="smallModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Transaksi</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="cetakpenj2.php">

                <label for="">Tanggal Awal</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_awal" class="form-control">
                    </div>
                </div>

                <label for="">Tanggal Akhir</label>
                <div class="form-group">
                    <div class="form-line">
                        <input type="date" name="tgl_akhir" class="form-control">
                    </div>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Cetak</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
            </form>
        </div>
    </div>
</div> 
</font> 
<!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> </div>     
        <div class="menu">
          <ul id="menu" >

            <li><a href="member2.php"><i class="fa fa-group"></i><span>Data Member</span></a></li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Laporan</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                  <li id="menu-academico-avaliacoes" ><a href="lappenj2.php">Laporan Transaksi</a></li>
                  <li id="menu-academico-boletim" ><a href="lapom2.php">Laporan Omset</a></li>
                  <li id="menu-academico-boletim" ><a href="lappet2.php">Laporan Pegawai</a></li>
                  <li id="menu-academico-avaliacoes" ><a href="lappel2.php">Laporan Pelanggan</a></li>
                  <li id="menu-academico-boletim" ><a href="laplan2.php">Laporan Laundry</a></li>
                  <li id="menu-academico-boletim" ><a href="lapout2.php">Laporan Outlet</a></li>
                 </ul>
            </li>

            <li><a href="index2.php"><i class="fa fa-shopping-cart"></i><span>Transaksi</span></a>
            </li>
          </ul>
        </div>
   </div>
  <div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>
