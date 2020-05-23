<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION['login']==1){
  if(!cek_login()){
    $_SESSION['login'] = 0;

  }
}
if($_SESSION['login']==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['password']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
      
?>
<?php 

 ?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Absen Siswa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
   
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <?php   
     include "pages/navbar.php";

 ?>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li>
                                    <a data-toggle="collapse" href="inbox.html">Home</a>
                            </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                </ul>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li>

                            <a href="home.php?&id=<?php echo $pecah['id_guru']; ?>"><i
                                    class="notika-icon notika-house"></i> Home</a>
                        </li>

                        <li>
                            <a href="absen_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i
                                    class="notika-icon notika-edit"></i>Absen Siswa</a>
                        </li>
                        <li>
                            <a href="nilai_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i
                                    class="notika-icon notika-form"></i>Nilai Siswa</a>
                        </li>
                        <li>
                            <a href="tugas_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i
                                    class="notika-icon notika-bar-chart"></i>Tugas Siswa</a>
                        </li>
                        <li>
                            <a href="kegiatan_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i
                                    class="notika-icon notika-windows"></i>Kegiatan Siswa</a>
                        </li>
                        <li class="active">
                            <a href="data_ortu.php?&id=<?php echo $pecah['id_guru']; ?>"><i
                                    class="notika-icon notika-star active"></i>Data Orang Tua</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        <h2>Data Orang Tua</h2>
                            <div class='table-responsive'>
                                <table id='data-table-basic' class='table table-striped'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nis</th>
                                            <th>Nama Ortu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php   $conn = new mysqli("localhost","root","","db_monitoring");
if (!$conn) {
 die("connection failed".$conn->connect_error());
}?>



                                        <?php $nomor=1; ?>
                                        <?php $ambil = $conn->query("SELECT * FROM tb_ortu"); ?>
                                        <?php while ($pecah = $ambil->fetch_assoc()) {
			 ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $pecah['nis']; ?></td>
                                            <td><?php echo $pecah['nama_ortu']; ?></td>
                                            <td>
                                                <a href="lihat_ortu.php?&id=<?php echo $pecah['id_guru']; ?>"
                                                    class="btn btn-primary"><i class="notika-icon notika-eye"></i></a>

                                                <a href="ubah_ortu.php?&id=<?php echo $pecah['id_guru']; ?>"
                                                    class="btn btn-warning"><i class="notika-icon notika-edit"></i></a>

                                                <a href="hapus_ortu.php?&id=<?php echo $pecah['id_guru']; ?>"
                                                    class="btn btn-danger"><i class="notika-icon notika-trash"></i></a>

                                            </td>

                                        </tr>
                                        <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <a href="tambah_ortu.php?&id=<?php echo $pecah['id_guru']; ?>" class="btn btn-primary">Tambah Data</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php   
include "pages/footer.php";

 ?>
            <!-- End Footer area-->
            <!-- jquery
        ============================================ -->
            <script src="js/vendor/jquery-1.12.4.min.js"></script>
            <!-- bootstrap JS
        ============================================ -->
            <script src="js/bootstrap.min.js"></script>
            <!-- wow JS
        ============================================ -->
            <script src="js/wow.min.js"></script>
            <!-- price-slider JS
        ============================================ -->
            <script src="js/jquery-price-slider.js"></script>
            <!-- owl.carousel JS
        ============================================ -->
            <script src="js/owl.carousel.min.js"></script>
            <!-- scrollUp JS
        ============================================ -->
            <script src="js/jquery.scrollUp.min.js"></script>
            <!-- meanmenu JS
        ============================================ -->
            <script src="js/meanmenu/jquery.meanmenu.js"></script>
            <!-- counterup JS
        ============================================ -->
            <script src="js/counterup/jquery.counterup.min.js"></script>
            <script src="js/counterup/waypoints.min.js"></script>
            <script src="js/counterup/counterup-active.js"></script>
            <!-- mCustomScrollbar JS
        ============================================ -->
            <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
            <!-- jvectormap JS
        ============================================ -->
            <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
            <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="js/jvectormap/jvectormap-active.js"></script>
            <!-- sparkline JS
        ============================================ -->
            <script src="js/sparkline/jquery.sparkline.min.js"></script>
            <script src="js/sparkline/sparkline-active.js"></script>
            <!-- flot JS
        ============================================ -->
            <script src="js/flot/jquery.flot.js"></script>
            <script src="js/flot/jquery.flot.resize.js"></script>
            <script src="js/flot/curvedLines.js"></script>
            <script src="js/flot/flot-active.js"></script>
            <!-- knob JS
        ============================================ -->
            <script src="js/knob/jquery.knob.js"></script>
            <script src="js/knob/jquery.appear.js"></script>
            <script src="js/knob/knob-active.js"></script>
            <!--  wave JS
        ============================================ -->
            <script src="js/wave/waves.min.js"></script>
            <script src="js/wave/wave-active.js"></script>
            <!--  Chat JS
        ============================================ -->
            <script src="js/chat/moment.min.js"></script>
            <script src="js/chat/jquery.chat.js"></script>
            <!--  todo JS
        ============================================ -->
            <script src="js/todo/jquery.todo.js"></script>
            <!-- plugins JS
        ============================================ -->
            <script src="js/plugins.js"></script>
            <!-- main JS
        ============================================ -->
            <script src="js/main.js"></script>
            <!-- tawk chat JS
        ============================================ -->
            <script src="js/tawk-chat.js"></script>
            <!--============================================ -->
            <script src="js/data-table/jquery.dataTables.min.js"></script>
            <script src="js/data-table/data-table-act.js"></script>
</body>

</html>
<?php
}
}
?>