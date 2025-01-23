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
<!--static chart-->
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],
         
                colIndexes: [2],
             
                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],
              
                ignoreCol: [2],
              
                chartType: 'GeoChart',
              
                chartAspectRatio: 1.5,
             
                chartZoom: 1.75,
             
                chartOffset: [-12,0],
             
                chartOptions: {
                  
                    width: null,
                 
                    backgroundColor: '#fff',
                 
                    datalessRegionColor: '#F5F5F5',
               
                    region: 'world',
                  
                    resolution: 'countries',
                 
                    legend: 'none',

                    colorAxis: {
                       
                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {
                     
                        trigger: 'focus',

                        isHtml: true
                    }
                }

               
            });                       
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
<?php
    session_start();
    if ($_SESSION['Jabatan']=="") {
        header("location:login.php?pesan=gagal");
    }
    ?>    
<div class="page-container">  
   <div class="left-content">
     <div class="mother-grid-inner">
            <!--header start here-->
        <div class="header-main">
          <div class="header-left">
              <div class="logo-name">
                   <a href="index.html"> <h1>RezLaundry</h1> 
                  <!--<img id="logo" src="" alt="Logo"/>--> 
                  </a>                
              </div>
              <!--search-box-->
            
              <!-- <div class="search-box">
                  <form>
                    <input type="text" placeholder="Search..." required=""> 
                    <input type="submit" value="">          
                  </form>
                </div>//end-search-box-->
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


<?php
include 'koneksi.php';
error_reporting(E_ALL^E_NOTICE);
$tgl = date("Y-m-d");
$sql = mysqli_query($koneksi, "SELECT * FROM `transaksi` WHERE `Status_p`= 'Baru'");
$baru = mysqli_num_rows($sql);  
?>

<?php
include 'koneksi.php';
$tgl=date('Y-m-d');
$sql2 = mysqli_query($koneksi, "SELECT * FROM `transaksi` WHERE `Status_p`= 'Diambil'");
$ambil = mysqli_num_rows($sql2);  
?>

<?php
include 'koneksi.php';
$tgl=date('Y-m-d');
$sql3 = mysqli_query($koneksi, "SELECT SUM(Total) as semua FROM transaksi WHERE Tgl_dtg='$tgl'");
while ($tampil3 = mysqli_fetch_assoc($sql3)) {
$omset = $tampil3['semua'];
  
  ?>
<?php } ?>
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
   <div class="market-updates">
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-1">
          <div class="col-md-8 market-update-left">
            <h3><?php echo $baru; ?></h3>
            <h4>Laundry Baru</h4>
            <!-- <p>Other hand, we denounce</p> -->
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-file-text-o"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-2">
         <div class="col-md-8 market-update-left">
          <h3><?php echo $ambil; ?></h3>
          <h4>Laundry Selesai</h4>
          <!-- <p>Other hand, we denounce</p> -->
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-eye"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-3">
          <div class="col-md-8 market-update-left">
            <h3><?php echo number_format($omset); ?>,-</h3>
            <h4>Omset Per Hari</h4>
            <!-- <p>Other hand, we denounce</p> -->
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-envelope-o"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
       <div class="clearfix"> </div>
    </div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<font face="Cambria Math">
<div class="chit-chat-layer1">
  <div class="col-md-13 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading"><i class="fa fa-shopping-cart"></i>
          DATA TRANSAKSI
        </div><br>
        <div class="table-responsive">
           <table class="table table-striped">
                  <tr>
                      <th>No</th>
                      <th>No Trans</th>
                      <th>Nama Pegawai</th>
                      <th>Nama Pelanggan</th>
                      <th>Tgl Datang</th>
                      <th>Tgl Ambil</th>
                      <th>Total</th>
                      <th>Status Paket</th>
                      <th>Pembayaran</th>
                  </tr>
                  <?php 
    include 'koneksi.php';
    $tgl = date("Y-m-d");
    if (isset($_GET['cari'])) {
       $cari = $_GET['cari'];
       $data = mysqli_query($koneksi, "SELECT * FROM transaksi where Nama_pel like '%$cari%' or No_trans like '%$cari%'");
     } else {
      $tgl = date('Y-m-d');
       $data = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi.Tgl_dtg='$tgl'");
     }
    $nomer=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $nomer++; ?></td> 
        <td><?php echo $d['No_trans']; ?></td>
        <td><?php echo $d['Kode_p']; ?></td>
        <td><?php echo $d['Nama_pel']; ?></td>
        <td><?php echo $d['Tgl_dtg']; ?></td>
        <td><?php echo $d['Tgl_ambil']; ?></td>
        <td><?php echo number_format($d['Total']); ?></td>
        <td><?php echo $d['Status_p']; ?></td>
        <td><font color="red"><?php echo $d['Pembayaran']; ?></font></td>
        
      </tr>
       <?php
     }
     ?>
      </table>  
        </div>
     </div>
  </div>
     
</div>
</font>

<font face="Cambria Math">
<div class="chit-chat-layer1">
  <div class="col-md-5 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading"><i class="fa fa-group"></i>
          DATA PELANGGAN
        </div><br>
        <div class="table-responsive">
          <table class="table table-striped">
                  <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Member</th>
                      <th>Alamat</th>
                     
                  </tr>
    <?php 
    include 'koneksi.php';
    if (isset($_GET['cari'])) {
       $cari = $_GET['cari'];
       $data = mysqli_query($koneksi, "SELECT * FROM member where Nama_pel like '%$cari%' or Kode_pel like '%$cari%'");
     } else {
       $data = mysqli_query($koneksi, "SELECT * FROM member");
     }
     $nomer=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $nomer++; ?></td>
        <td><?php echo $d['Kode_pel']; ?></td>
        <td><?php echo $d['Nama_pel']; ?></td>
        <td><?php echo $d['Alamat']; ?></td>
        
      </tr>
  <?php 
    }
    ?>

  </table>
        </div>
     </div>
  </div>
     
</div>
</font>

<font face="Cambria Math">
<div class="chit-chat-layer1">
  <div class="col-md-7 chit-chat-layer1-left">
     <div class="work-progres">
        <div class="chit-chat-heading"><i class="fa fa-user"></i>
          DATA PEGAWAI
        </div><br>
        <div class="table-responsive">
           <table class="table table-hover">
                  <tr>
                      <th>No</th>
                      <th>Kode P</th>
                      <th>Kode O</th>
                      <th>Nama Pegawai</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Foto</th>
                  </tr>
            
    <?php 
    include 'koneksi.php';
     if (isset($_GET['cari'])) {
       $cari = $_GET['cari'];
       $data = mysqli_query($koneksi, "SELECT * FROM pegawai where Nama_p like '%$cari%' or Kode_p like '%$cari%'");
     } else {
       $data = mysqli_query($koneksi, "SELECT * FROM pegawai");
     }
     $nomer=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $nomer++; ?></td>
        <td><?php echo $d['Kode_p']; ?></td>
        <td><?php echo $d['Kode_outlet']; ?></td>
        <td><?php echo $d['Nama_p']; ?></td>
        <td><?php echo $d['Jabatan']; ?></td>
        <td><?php echo $d['Status']; ?></td>
        <td><img src='images/<?php echo $d['Foto'] ?>'></td>

      </tr>
      <?php 
    }
    ?>
  </table>
        </div>
     </div>
  </div>
     
</div>
</font>
<!--main page chit chating end here-->
<!--main page chart start here-->

<!--main page chart layer2-->
<div class="chart-layer-2">
  
  <div class="col-md-6 chart-layer2-right">
      
  </div>
</div>

<!--climate start here-->
<div class="climate">
  
  
  
  <div class="clearfix"> </div>
</div>
<!--climate end here-->
</div>
<!--inner block end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> </div>     
        <div class="menu">
          <ul id="menu" >
            <li id="menu-home" ><a href="index3.php"><i class="fa fa-th-large"></i><span>Beranda</span></a>
            </li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Laporan</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                  <li id="menu-academico-avaliacoes" ><a href="lappenj3.php">Laporan Transaksi</a></li>
                  <li id="menu-academico-boletim" ><a href="lapom3.php">Laporan Omset</a></li>
                  <li id="menu-academico-boletim" ><a href="lappet3.php">Laporan Pegawai</a></li>
                  <li id="menu-academico-avaliacoes" ><a href="lappel3.php">Laporan Pelanggan</a></li>
                  <li id="menu-academico-boletim" ><a href="laplan3.php">Laporan Laundry</a></li>
                  <li id="menu-academico-boletim" ><a href="lapout3.php">Laporan Outlet</a></li>
                 </ul>
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