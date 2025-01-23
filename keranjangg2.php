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
        <a href="keranjanglagi2.php?Kode_paket=<?php echo $d['Kode_paket']; ?>" class="btn btn-info"><i class="fa fa-shopping-bag"></i></a>
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
 <table class="table table-striped">
                  <tr>
                      <th>No</th>
                      <!-- <th>Kode Outlet</th> -->
                      <th>Kode Paket</th>
                      <th>Tgl Datang</th>
                      <th>Status Paket</th>
                      <th>Nama Pelanggan</th>
                      <th>Paket Laundry</th>
                      <th>Harga</th>
                      <th>Berat(Kg)</th>
                      <th>Subtotal</th>
                      <th>Pembayaran</th>
                      <th>Opsi</th>
                  </tr>

                  <?php $total=0; ?>

                  <?php 
    include 'koneksi.php';
// error_reporting(E_ALL^E_NOTICE);

    $tgl = date("Y-m-d");
    // $kdo = $_GET['Kode_outlet'];
    $data = mysqli_query($koneksi,"SELECT * from keranjang");

    $nomer=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $nomer++; ?></td> 
        <td><?php echo $d['Kode_paket']; ?></td>
        <td><?php echo $d['Tgl_dtg']; ?></td>
        <td><button class="btn btn-primary"><?php echo $d['Status_p']; ?></button></td>
        <td><?php echo $d['Nama_pel']; ?></td>
        <td><?php echo $d['Jenis']; ?></td>
        <td><?php echo number_format($d['Harga']); ?></td>
        <td><?php echo $d['Jumlah']; ?></td>
        <td><?php echo number_format($d['Subtotal']); ?></td>
        <td><button class="btn btn-warning"><?php echo $d['Pembayaran']; ?></button></td>
        <td>
        <a href="edit_keranjang2.php?Kode_paket=<?php echo $d['Kode_paket']; ?>" onclick="return confirm('Apakah anda yakin edit?')"><i class='fa fa-edit fa-fw'></i></a>|
        <a href="hapus_keranjang2.php?Kode_paket=<?php echo $d['Kode_paket']; ?>" onclick="return confirm('Apakah anda yakin hapus?')"><i class="fa  fa-trash-o fa-fw"></i></a>
        </td>
      </tr>

      <?php $total = $total+($d['Jumlah'] * $d['Harga']) ?>
     
       <?php
     }
     ?>
 </table>
      
    

    <form action="simpan_transaksi2.php" method="post">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">


        <?php 
    include 'koneksi.php';
    $user=$_SESSION['Username']; 
    
    $data = mysqli_query($koneksi,"SELECT Kode_outlet, Kode_p from pegawai WHERE pegawai.Username='$user'");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><input type="hidden" name="Kode_outlet" class="form-control" value="<?php echo $d['Kode_outlet']; ?>"></td>
        <td><input type="hidden" name="Kode_p" class="form-control" value="<?php echo $d['Kode_p']; ?>"></td>
      </tr> 
      <?php
     }
     ?>

     <?php 
    include 'koneksi.php';    
    $data = mysqli_query($koneksi,"SELECT Nama_pel from keranjang WHERE No_trans='$notr'");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><input type="hidden" name="Nama_pel" class="form-control" value="<?php echo $d['Nama_pel']; ?>"></td>
      </tr> 
      <?php
     }
     ?>

     <?php 
    include 'koneksi.php';    
    $data = mysqli_query($koneksi,"SELECT DATE_ADD(Tgl_dtg, INTERVAL 7 DAY) AS Tgl_ambil FROM keranjang");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><input type="hidden" class="form-control" name="Tgl_ambil" value="<?php echo $d['Tgl_ambil']; ?>"></td>
      </tr> 
      <?php
     }
     ?>

     <?php 
    include 'koneksi.php';    
    $data = mysqli_query($koneksi,"SELECT Status_p, Pembayaran FROM keranjang WHERE No_trans='$notr'");
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><input type="hidden" class="form-control" name="Status_p" value="<?php echo $d['Status_p']; ?>"></td>
        <td><input type="hidden" class="form-control" name="Pembayaran" value="<?php echo $d['Pembayaran']; ?>"></td>
      </tr> 
      <?php
     }
     ?>

        <input type="hidden" class="form-control" name="No_trans" value="<?php echo $notr; ?>">

        <input type="hidden" class="form-control" name="Batas_waktu" value="7 hari">
        

        <label>Total Bayar</label>
        <input type="text" id="total" name="total" class="form-control" readonly="" value="<?php echo $total;?>">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
  $(".form-group").keyup(function(){
  var Diskon = parseInt($("#Diskon").val())
  var total = parseInt($("#total").val())
  var Pajak = parseInt($("#Pajak").val())
  var Biaya_tambahan = parseInt($("#Biaya_tambahan").val())

  var hasildiskon = (Diskon/100);

  var hasilpajak = (Pajak/100);

  var hasiltmbhbiaya = Biaya_tambahan;
  var Total1 = total-hasildiskon;
  var Total2 = Total1+hasilpajak;
  var Total3 = Total2+hasiltmbhbiaya;
  var Total = Total3;

  $("#Total").attr("value", Total)
  }); 
  </script>
        <label>Diskon</label>
        <input type="number" id="Diskon" name="Diskon" class="form-control">
        <label>Pajak</label>
        <input type="number" id="Pajak" name="Pajak" class="form-control">
        <label>Biaya Tambahan</label>
        <input type="number" id="Biaya_tambahan" name="Biaya_tambahan" class="form-control">
        <br>
        <!-- <button type="submit" class="btn btn-warning"></i> Hitung Akhir</button> -->

          </div>
        </div>

                              <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Total Akhir</label>
                                    <input type="number" id="Total" name="Total" class="form-control" required="" placeholder="Total">
                                
                                    <br>
                              <button type="submit" class="btn btn-success">Simpan Data Datang</button>
   
                        </div>
                      </div>
 
           </div>
         </form>

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


                      
						
