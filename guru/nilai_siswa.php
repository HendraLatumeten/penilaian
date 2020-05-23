<?php 
include "pages/session.php";

?>


<!doctype html>
<html class="no-js" lang="">
<?php include 'pages/head.php'; ?>
<body>

    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                         <a href=""><img src="../img/logo/logo1.png" alt="" /></a>
                    </div>
                </div>
                <?php   
                include "pages/navbar.php";

                ?>
            </div>
        </div>
    </div>



    <!-- menu -->

    <?php 
    include "pages/menu.php";
    ?>
    <!-- end menu -->
    <?php 


    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "db_monitoring";

// Koneksi dan memilih database di server

    $id=$_SESSION['guru'];
    $koneksi = mysqli_connect($server,$username,$password,$database);
    $get = $koneksi->query("SELECT * FROM tb_guru WHERE id_guru= '$id'");
    while ($row = $get->fetch_assoc()) {
     $id_guru=$row['id_guru']; 
 }

 ?>

</div>
<!-- Main Menu area End-->
<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
              <div class="data-table-area">
                <div class="row">
                 <?php $nomor=1; ?>
                 <?php $get = $koneksi->query("SELECT * FROM tb_tugas JOIN tb_mapel ON tb_tugas.id_mapel=tb_mapel.id_mapel JOIN tb_kelas ON tb_tugas.id_kelas=tb_kelas.id_kelas WHERE id_guru='$id_guru' order by batas_pengumpulan desc "); ?>
                 <?php while ($row = $get->fetch_assoc()) {
                     ?>

                     <div class="col-sm-3">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_mapel']; ?></h5>
                            <p class="card-text"><?php echo date("d M Y", strtotime($row['batas_pengumpulan']));  ?>||
                                  <?php 
                                  date_default_timezone_set("Asia/Jakarta");
                                  $tanggal= mktime(date("m"),date("d"),date("Y"));
                                  $tgl=date("Y-m-d", $tanggal);
                                  $awal=$row['tanggal_tugas'];
                                  $akhir=$row['batas_pengumpulan']; 
                                  $id_tugas=$row['id_tugas'];
                                  $penilaian=$row['penilaian'];
                                  echo 'Kelas: '.$row['kelas'];;
                                  if ($tgl >= $akhir) {
                                    echo '<span class="badge badge-success">';
                                    echo 'Tugas Berakhir';
                                    echo '</span>';
                                      echo '<br>';
                                


                                }elseif ($tgl <= $akhir){

                                    $tanggal = new DateTime($row['batas_pengumpulan']); 
                                    $sekarang = new DateTime();
                                    $perbedaan = $tanggal->diff($sekarang);
                                    echo '<span class="badge badge-danger">';
                                    echo '< '. $perbedaan->d .' Hari ' . $perbedaan->h. ' jam';
                                    echo '</span>';
                                    echo "</p>";

                                    
                                }if($penilaian == 0){
                                
                                  echo "<a href='detail_penilaian.php?id=$id_tugas' class='btn btn-primary'>Penilaian</a>";

                                }elseif($penilaian == '1'){
                                    echo '<button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Anda suda Menilai">Penilaian
                                </button>';

                                }


                                 

                               

                                
                                             

                                            ?>

                            
                          
                           
                        </div><br>
                    </div><br>
                </div>



                <?php $nomor++; ?>
                <?php } ?> 

            </div>
        </div>
    </div>
</div>
</div>


<?php   
include "pages/footer.php";

?>
<link rel="stylesheet" href="../bootstrap.min.css" crossorigin="anonymous">
<?php include 'pages/script.php'; ?>   

</body>

</html>

