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
              <font color="white">
              <?php
                    if (isset($_GET['cari'])) {
                      $cari = $_GET['cari'];
                      echo ".$cari. ";
                    }
                    ?> 
              </font>
								<div class="search-box">
                  <form>
                    <input type="text" name="cari" placeholder="Search..." required=""> <font color="#8FBC8F"><i class="fa fa-search"></i></font>
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
    <h2><font face="Cambria Math">Data Transaksi Datang</font></h2>
<div class="card">
 <button type="submit" class="btn btn-primary " data-toggle="modal" data-target="#myModal"></span><i class="fa fa-shopping-bag">    Tambah Transaksi</i></button> 

  <!-- <form action="tambah_trans.php"> -->
  
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title">Pilih Paket
             <button type="button" class="close" data-dismiss="modal">&times;</button></h4>
           </div>
           <div class="modal-body">
             <p>
                   <div class="table-responsive">
                     <table id="zero_config" class="table table-striped table-bordered">
                       <thead>
                         <br/>
                  <tr>  
                      <th>Kode Paket</th>
                      <th>Kode Outlet</th>
                      <th>Jenis</th>
                      <th>Nama Paket</th>
                      <th>Harga/Kg</th>
                      <th>Opsi</th>
                  </tr>

     <?php 
    
    include 'koneksi.php';
    $user = $_SESSION['Username'];
    $data = mysqli_query($koneksi,"SELECT * FROM `paket` INNER JOIN pegawai ON paket.Kode_outlet=pegawai.Kode_outlet WHERE pegawai.Username='$user'");
    while($d = mysqli_fetch_array($data)){
      ?>

      <tr>
        <td><?php echo $d['Kode_paket']; ?></td>
        <td><?php echo $d['Kode_outlet']; ?></td>
        <td><?php echo $d['Jenis']; ?></td>
        <td><?php echo $d['Nama_paket']; ?></td>
        <td><?php echo number_format($d['Harga']); ?></td>
        <td>
        <a href="keranjang.php?Kode_paket=<?php echo $d['Kode_paket']; ?>" class="btn btn-info"><i class="fa fa-shopping-bag"></i></a>
        </td>
        <?php 
        }    
        ?>
        </tr>
                      </thead>
                     </table>
                   </div>
                 </div>
               </div>
             </p>
           </div>
         </div>
         
    <!-- </form></form> -->
 
  </div>
  <br>
  <div class="col-md-13">
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
                      <th>&nbsp &nbsp &nbsp &nbsp &nbsp Opsi</th>
                  </tr>
                  <?php 
    include 'koneksi.php';
    $tgl = date("Y-m-d");
    if (isset($_GET['cari'])) {
       $cari = $_GET['cari'];
       $data = mysqli_query($koneksi, "SELECT * FROM transaksi where Nama_pel like '%$cari%' or No_trans like '%$cari%'");
     } else {
      $tgl = date('Y-m-d');
       $data = mysqli_query($koneksi, "SELECT * FROM `transaksi` WHERE Status_p='Baru' OR Status_p='Proses' OR Status_p='Selesai'");
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
         <td>
        <?php if ($d['Pembayaran']=='Lunas') { ?>
         <font color="green">Lunas</font>
        <?php }  else if ($d['Pembayaran']=='Belum lunas') {?>
          <font color="red">Belum lunas</font>
        <?php } ?>
        </td>
      
        <td>
        <a href="detail.php?No_trans=<?php echo $d['No_trans']; ?>" class="btn btn-info">Detail</a>
        
        <button type="submit" name="cetak" class="btn btn-warning" onclick="window.open('cetak.php?No_trans=<?php echo $d['No_trans']; ?>&Username=<?php echo $_SESSION['Username']; ?>','mywindow', 'width=450px, height=700px')"> Cetak</button>
        </td>
      </tr>
       <?php
     }
     ?>
      </table>

      </div>
</div>
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


                      
						
