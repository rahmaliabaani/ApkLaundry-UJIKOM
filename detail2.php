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
      <h2><font face="Cambria Math">Detail Data Laundry</font></h2>
      <?php
      include 'koneksi.php';
        $tgl = date("d-m-Y");
        $notr=$_GET['No_trans'];
        $query=mysqli_query($koneksi, "SELECT * FROM transaksi WHERE No_trans='$notr'");
      while ($q = mysqli_fetch_array($query)) {
      ?>
      <form action="update_transaksi2.php" method="post">
        <div class="row">
          <div class="col-md-4">
              
              <td>No Trans</td>
              <td><input type="text" size="20" name="No_trans" class="form-control" readonly="" value="<?php echo $q['No_trans']; ?>"></td>

              <td>Nama Pelanggan</td>
              <td><input type="text" name="Nama_pel" size="20" class="form-control" readonly="" value="<?php echo $q['Nama_pel']; ?>"></td>

              <td>Tanggal Datang</td>
              <td><input type="date" class="form-control" readonly="" value="<?php echo $q['Tgl_dtg']; ?>" name="Tgl_dtg"></td>
              </div>

              <div class="col-md-4">
         
              <td>Status Paket</td>
              <td><select name="Status_p" class="form-control">
                <option><?php echo $q['Status_p'];?></option>
                <option value="Baru">Baru</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
                <option value="Diambil">Diambil</option>
              </select></td>

              <td>Pembayaran</td>
              <td><select name="Pembayaran" class="form-control">
                <option><?php echo $q['Pembayaran'];?></option>
                <option value="Lunas">Lunas</option>
                <option value="Belum lunas">Belum lunas</option>
              </select></td>

              <td>Tanggal Ambil</td>
              <td><input type="date" class="form-control" name="Tgl_ambil" value="<?php echo $q['Tgl_ambil'];?>"></td>
                  
              </div>
              <div class="col-md-4">
                <td>Diskon%</td>
                <input type="number" id="diskon" name="Diskon" class="form-control" readonly="" value="<?php echo $q['Diskon']; ?>">
                <td>Pajak%</td>
                <input type="number" id="pajak" name="Pajak" class="form-control" readonly="" value="<?php echo $q['Pajak']; ?>">
                <td>Biaya Tambahan</td>
                <input type="number" id="pajak" name="Biaya_tambahan" class="form-control" readonly="" value="<?php echo $q['Biaya_tambahan']; ?>">
        
              </div>
         </div>
      
      <?php
      }
      ?>
                  <?php $total=0; ?>
    <div class="col-md-9">
      <table class="table table-striped">
                  <tr>
                      <th>No</th>
                      <th>Paket Laundry</th>
                      <th>Nama Paket</th>
                      <th>Berat(Kg)</th>
                      <th>Harga/Kg</th>
                      <th>Subtotal</th>
                  </tr>

                  <br>
                  <?php 
    include 'koneksi.php';
    // $notr=$_GET['No_trans'];
    $tgl = date("Y-m-d");
    $data = mysqli_query($koneksi,"SELECT * from detail where No_trans='$notr'");
    $nomer=1;
    while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
        <td><?php echo $nomer++; ?></td> 
        <td><?php echo $d['Jenis']; ?></td>
        <td><?php echo $d['Nama_paket']; ?></td>
        <td><?php echo $d['Jumlah']; ?></td>
        <td><?php echo number_format($d['Harga']); ?></td>
        <td><?php echo number_format($d['Subtotal']); ?></td>
        
      </tr>
      <?php $total = $total+($d['Jumlah'] * $d['Harga']) ?>

       <?php
     }
     ?>
      </table>
      </div>
<br>
<?php
      include 'koneksi.php';
        $tgl = date("d-m-Y");
        $notr=$_GET['No_trans'];
        $query=mysqli_query($koneksi, "SELECT * FROM transaksi WHERE No_trans='$notr'");
      while ($q = mysqli_fetch_array($query)) {
      ?>
      <div class="row">
          <div class="col-md-3">
            <div class="form-group">
        <label>Total (Rp)</label>
        <input type="number" id="Total" name="Total" class="form-control" readonly="" value="<?php echo $q['Total'];?>">
<?php } ?>
        <label>Tunai</label>
        <input type="text" id="Tunai" name="Tunai" class="form-control">

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
          <script type="text/javascript">
          $(".form-group").keyup(function(){
          var Tunai = parseInt($("#Tunai").val())
          var Total = parseInt($("#Total").val())

          var Kembali = Tunai - Total;
          $("#Kembali").attr("value", Kembali)
          }); 
          </script>

        <label>Kembali</label>
        <input type="text" id="Kembali" name="Kembali" class="form-control" readonly="" placeholder="Kembali">

        

        <br>
        <button type="submit" class="btn btn-success"><i class="fa fa-shopping-basket fa-fw"></i> Bayar</button>
        </div>
      </div>
    </div>
     </form> 
      
    </div>

  </div>
</font>
</div>
</div>
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