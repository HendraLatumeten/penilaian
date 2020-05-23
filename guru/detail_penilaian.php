<?php 
include "pages/session.php";

?>
<?php 


$server = "localhost";
$username = "root";
$password = "";
$database = "db_monitoring";

// Koneksi dan memilih database di server

$id   =$_SESSION['guru'];

$koneksi = mysqli_connect($server,$username,$password,$database);
$get = $koneksi->query("SELECT * FROM tb_guru WHERE id_guru= '$id'");
while ($row = $get->fetch_assoc()) {
    $id_guru=$row['id_guru']; 
    $nama_guru=$row['nama_guru']; 

}

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
                        <a href="#"><img src="../img/logo/logo1.png" alt="" /></a>
                    </div>
                </div>
                <?php   
                include "pages/navbar.php";

                ?>
            </div>
        </div>
    </div>


    <?php $data1= $koneksi->query("SELECT * FROM tb_tugas JOIN tb_mapel ON tb_tugas.id_mapel=tb_mapel.id_mapel JOIN tb_kelas ON tb_tugas.id_kelas=tb_kelas.id_kelas WHERE id_tugas='2'"); 
    while ($row = $data1->fetch_assoc()) {
        $id_kelas=$row['id_kelas']; 
        $id_mapel=$row['id_mapel']; 
        $id_guru=$row['id_guru']; 
        $id_tugas=$row['id_tugas']; 


        $nama_mapel=$row['nama_mapel']; 
        $kelas=$row['kelas']; 

 
    ?>
    <!-- menu -->

    <?php 
    include "pages/menu.php";
    ?>
    <!-- end menu -->

</div>
<!-- Main Menu area End-->
<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">

               <form action="" method="get">
                 <div class="form-example-int form-horizental">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">Nama Guru :</label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <label><?php echo $nama_guru ?></label>
                                    <input type="hidden" name="guru" class="form-control input-sm"
                                    value="<?php echo $id_guru; ?>">
                                    <input type="hidden" name="tugas" class="form-control input-sm"
                                    value="<?php echo $id_tugas; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-example-int form-horizental">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">Mata Pelajaran :</label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <label><?php echo $nama_mapel ?></label>
                                    <input type="hidden" name="mapel" class="form-control input-sm"
                                    value="<?php echo $id_mapel; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-example-int form-horizental">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                <label class="hrzn-fm">Kelas :</label>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="nk-int-st">
                                    <label><?php echo $kelas ?></label>
                                    <input type="hidden" name="kelas" class="form-control input-sm"
                                    value="<?php echo $id_kelas; ?>">
                                </div>
                            </div>
                            
                                    <div class="dialog-pro dialog">
                             
                                        <a href="#" class="btn btn-info" id="sa-title" >Info</a>
                                    </div>
                               
                        </div>
                    </div>
                </div>

                <!--  <div class="table-responsive"> -->
                  <table  class='table table-striped'>
                    <br>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>

                    <?php  

                    $sql="select * from tb_siswa where id_kelas= '$id_kelas' ";
                    $hasil=mysqli_query($koneksi,$sql);
                    $no=0;
                    while ($data = mysqli_fetch_array($hasil)) {
                        $no++;

                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data["nis"]; ?></td>
                                <td><?php echo $data["nama"];   ?>



                                <!-- proses -->
                                <td><input type="number" class="input-sm"  name="nilai[]" value="" min="10" max="100" >
                                <input type="number" class="input-sm"  name="yes[]" value="<?php echo $data["id_siswa"]; ?>" >                          
                                </td>
                                <!-- endProses -->


                                
                            </tr>
                        </tbody>
                        <?php
                    }
                    ?>
                </table>
                <button class="btn btn-login btn-success" type="submit" name="a" >Simpan</button>

            </form>
            <?php    } ?>
        </div>
    </div>
</div>
</div>
<?php   
include "pages/footer.php";

?>

<?php include 'pages/script.php'; ?>   

<?php 
$conn = new mysqli("localhost","root","","db_monitoring");
if (!$conn) {
   die("connection failed".$conn->connect_error());
}
//proses memasukkan absensi
if (isset($_GET['a'])) {
   $date = date("Y-m-d");
   $jam=date("H:i:s");
   $nilai = $_GET["nilai"];
   $mapel = $_GET["mapel"];
   $kelas = $_GET["kelas"];
   $id_tugas = $_GET["tugas"];




   $koneksi = new mysqli("localhost","root","","db_monitoring");
   $id=$_SESSION['guru'];

   $ambil=$koneksi->query("SELECT * FROM tb_guru WHERE id_guru = $id "); 
   while ($pecah=$ambil->fetch_assoc()) {
    $id_guru= $pecah['id_guru'];

} 

// EDIT
for ($i=0; $i < count($_GET['yes']); $i++) { 
    
    // ID SISWA
    $id_siswa = $_GET['yes']['id_siswa']; // Ganti ke value yg bnr
    $ket = 1;
    $insert = "insert into tb_nilai values('".$id_tugas."','".$id_guru."','".$mapel."','".$kelas."','".$id_siswa."','".$nilai."','".$ket."','".$date."')";
    $conn->query($insert);

    // NILAI
    $id_siswa = $_GET['nilai']['nilai']; // Ganti ke value yg bnr
    $insert = "insert into tb_nilai values('','".$id_tugas."','".$id_guru."','".$mapel."','".$kelas."','".$id_siswa."','".$nilai."','".$ket."','".$date."')";
    $conn->query($insert);
}
// EDIT


// foreach ($_GET['yes'] as $a => $id_siswa) {
//     if ($a = null) {

//     }
//     $ket = 1;
//     $insert = "insert into tb_nilai values('".$id_tugas."','".$id_guru."','".$mapel."','".$kelas."','".$id_siswa."','".$nilai."','".$ket."','".$date."')";
//     $conn->query($insert)===TRUE;
    
// }

// foreach ($_GET['nilai'] as $b => $nilai) {
//     if ($b = null) {

//     }
//     $insert = "insert into tb_nilai values('','".$id_tugas."','".$id_guru."','".$mapel."','".$kelas."','".$id_siswa."','".$nilai."','".$ket."','".$date."')";
//     $conn->query($insert)===TRUE;
// }


// echo "$id_tugas"; 
// echo "<br>";
// echo "$id_guru";
// echo "<br>";
// echo var_dump($mapel);
// echo "<br>";
// echo "$kelas";
// echo "<br>";
// echo "$id_siswa";
// echo "<br>";
// echo "$nilai"; 
// echo "<br>";
// echo "$ket"; 
// echo "<br>";
// echo "$date";



echo "<script>alert('Nilai Berhasil DiInput')</script>";
echo "<script>location='nilai_siswa.php';</script>";


}

?>

</body>

</html>

