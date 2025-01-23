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
              <!--search-box-->
                <div class="search-box">
                  <form>
                    <input type="text" placeholder="Search..." required=""> 
                    <input type="submit" value="">          
                  </form>
                </div><!--//end-search-box-->

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
<font face="Cambria Math">
<div class="inner-block">
    <div class="blank">
      <?php
  include 'koneksi.php';
  $query = "SELECT max(No_trans) AS maxKode FROM transaksi";
  $hasil = mysqli_query($koneksi,$query);
  $data = mysqli_fetch_array($hasil);
  $notr = $data['maxKode'];
  $nourut = (int)substr($notr, 3, 3);
  $nourut++;

  $char = "TR-";
  $notr = $char . sprintf("%03s", $nourut);
  ?>
     <h2><font face="Cambria Math">Input Data Laundry</font></h2>
      <?php
      include 'koneksi.php';
        $tgl = date("d-m-Y");
        $kdpa=$_GET['Kode_paket'];
        $query=mysqli_query($koneksi, "SELECT * FROM keranjang WHERE Kode_paket='$kdpa'");
        
      while ($q = mysqli_fetch_array($query)) {
      ?>
      <form action="update_keranjang.php" method="post">
              <div class="row">
                <div class="col-md-6">
              
              <!-- <td>No Trans</td> -->
              <td><input type="hidden" size="20" name="No_trans" class="form-control" readonly="" value="<?php echo $notr; ?>"></td>

              <td>Kode Paket</td>
              <td><input type="text" id="Kode_paket" name="Kode_paket" class="form-control" readonly="" value="<?php echo $q['Kode_paket']; ?>"></td>
              
              <!-- <td>Tanggal</td> -->
              <td><input type="hidden" class="form-control" readonly="" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("d-m-Y"); ?>" name="Tgl_dtg"></td>

      <?php
      include 'koneksi.php';
      $data = mysqli_query($koneksi, "SELECT * FROM keranjang");
      ?>
              <td>Nama Pelanggan</td>
                <td><select name="Nama_pel" class="form-control" required="">
                <?php while ($d = mysqli_fetch_array($data)) {?>
                  <option value="<?php echo $d['Nama_pel']; ?>"><?php echo $d['Nama_pel'];?></option>
                <?php } ?> 
                </select></td>
              
              <td>Paket Laundry</td>
              <td><input type="text" id="Jenis" name="Jenis" class="form-control" readonly="" value="<?php echo $q['Jenis']; ?>"></td>
              
              <td>Nama Paket</td>
              <td><input type="text" name="Nama_paket" size="20" placeholder="Masukan Nama Paket" class="form-control" readonly="" value="<?php echo $q['Nama_paket']; ?>"></td>
         
              <td>Status Paket</td>
              <td><select name="Status_p" class="form-control">
                <option value="<?php echo $q['Status_p']; ?>"><?php echo $q['Status_p'];?></option>
                <option value="Baru">Baru</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
                <option value="Diambil">Dibayar</option>
              </select></td>

              </div>

              <div class="col-md-6">
                <div class="form-group">
              <td>Harga(Rp)</td>
              <td><input type="number" id="Harga" name="Harga" class="form-control" required="required" readonly="" value="<?php echo $q['Harga']; ?>"></td>
       
              <td>Berat(Kg)</td>
              <td><input type="number" id="Jumlah" name="Jumlah" class="form-control" required="required" value="<?php echo $q['Jumlah']; ?>"></td>

              <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script type="text/javascript">
                  $(".form-group").keyup(function(){
                  var Harga = parseInt($("#Harga").val())
                  var Jumlah = parseInt($("#Jumlah").val())

                  var Subtotal = Harga * Jumlah;
                  $("#Subtotal").attr("value", Subtotal)
                  }); 
                </script>

              <td>Subtotal</td>
              <td><input type="number" id="Subtotal" name="Subtotal" readonly="" class="form-control" value="<?php echo $q['Subtotal'];?>"></td>

              <td>Pembayaran</td>
              <td><select name="Pembayaran" class="form-control">
                <option value="<?php echo $q['Pembayaran']; ?>"><?php echo $q['Pembayaran']; ?></option>
                <option value="Lunas">Lunas</option>
                <option value="Belum lunas">Belum lunas</option>
              </select></td>
              <br>
                  <td></td><td><input type="submit" name="proses" value="Proses" class="btn btn-info"></td>
                  </div>
                  </div>
                </div>
      </form>
       <?php
      }
      ?> 
</div>
</div>
</font>
<!--  -->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> </div>     
        <div class="menu">
          <ul id="menu" >
            <li id="menu-home" ><a href="index.php"><i class="fa fa-th-large"></i><span>Beranda</span></a>
            </li>
            
            <li id="menu-comunicacao" ><a href="dtpaket.php"><i class="fa fa-book nav_icon"></i><span>Data Paket Laundry</span></a>
            </li>
            
            <li><a href="dtoutlet.php"><i class="fa fa-cubes"></i><span>Data Outlet</span></a></li>

            <li><a href="member.php"><i class="fa fa-group"></i><span>Data Member</span></a></li>

            <li><a href="pegawai.php"><i class="fa fa-user"></i><span>Data Pegawai</span></a></li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text"></i><span>Laporan</span><span class="fa fa-angle-right" style="float: right"></span></a>
               <ul id="menu-academico-sub" >
                  <li id="menu-academico-avaliacoes" ><a href="lappenj.php">Laporan Transaksi</a></li>
                  <li id="menu-academico-boletim" ><a href="lapom.php">Laporan Omset</a></li>
                  <li id="menu-academico-boletim" ><a href="lappet.php">Laporan Pegawai</a></li>
                  <li id="menu-academico-avaliacoes" ><a href="lappel.php">Laporan Pelanggan</a></li>
                  <li id="menu-academico-boletim" ><a href="laplan.php">Laporan Laundry</a></li>
                  <li id="menu-academico-boletim" ><a href="lapout.php">Laporan Outlet</a></li>
                 </ul>
            </li>

             <li><a href="transaksidtg.php"><i class="fa fa-shopping-cart"></i><span>Transaksi</span></a>
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