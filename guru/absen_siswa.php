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
                          <a href="#"><img src="../img/logo/logo1.png" alt="" /></a>
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
    $id=$_SESSION['guru'];
    
    $ambil=$koneksi->query("SELECT * FROM tb_guru WHERE id_guru = $id "); 
    while ($pecah=$ambil->fetch_assoc()) {
        $nama = $pecah['nama_guru'];
    }
    ?>
    <!-- end menu -->


    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">


                    <?php 

                    $id=$_SESSION['guru'];
                    ?>
                    <form  method="get" >
                        <div class="data-table-area">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="data-table-list">
                                        <div class="basic-tb-hd">
                                            <h2>Absensi Siswa SD Suka Mundur </h2>
                                            <p>Mengisi Sesuai Kehadiran Siswa</p>
                                            <p>Nama Guru : <b><?php echo $nama ?></b> </p>
                                            <p>

                                                <?php  

                                                $tanggal= mktime(date("m"),date("d"),date("Y"));
                                                echo "Tanggal ".": "."<b>".date("d-M-Y", $tanggal)."</b>";
                                                date_default_timezone_set("Asia/Jakarta");
                                                $jam=date("H:i:s");
                                                echo " | Pukul : <b>". $jam." "."</b>";
                                                $a = date ("H");
                                                ?>
                                                <br><hr>
                                                <div class="form-group">
                                                    <div class="row">
                                                       <div class="col-md-6">
                                                        <label for="sel1"><b>Kelas:</b></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="sel1"><b>Mata Pelajaran</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="kelas" onchange="this.form.submit();">
                                                        <option value="">--Pilih--</option>
                                                        <?php
                                                        $koneksi = new mysqli("localhost","root","","db_monitoring");
                //Perintah sql untuk menampilkan semua data pada tabel kelas
                                                        $sql="select * from tb_kelas";

                                                        $hasil=mysqli_query($koneksi,$sql);
                                                        $no=0;

                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                            $no++;

                                                            $ket="";
                                                            if (isset($_GET['kelas'])) {
                                                                $kelas = trim($_GET['kelas']);

                                                                if ($kelas==$data['id_kelas'])
                                                                {
                                                                    $ket="selected";
                                                                }
                                                            }
                                                            ?>
                                                            <option <?php echo $ket; ?> value="<?php echo $data['id_kelas'];?>"><?php echo $data['kelas'];?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </form>
                                            <form action="" method="get">
                                              <div class="form-group col-md-6">
                                                <?php 
                                                $conn = new mysqli("localhost","root","","db_monitoring");

                                                $sql = "select * from tb_mapel";
                                                $result = mysqli_query($conn,$sql);  ?>

                                                <select name="mapel"   class="form-control">
                                                    <option>Pilih</option>
                                                    <?php
                                                    while($row=mysqli_fetch_assoc($result)){
                                                        echo'<option class="" value="'.$row['id_mapel'].'">'.$row['nama_mapel'].'</option>';
                                                    }
                                                    ?>
                                                </select>

                                                <!--   <select name="mapel" class="form-control" required>
                                                      <option value="">--Pilih--</option>
                                                      <option value="matematika">Metematika</option>
                                                      <option value="bhs.inggris">Bhs.Inggris</option>
                                                      <option value="bhs.indonesia">Bhs.Indonesia</option>
                                                  </select>  -->
                                              </div>
                                             <!--  <div class="table-responsive"> -->
                                                  <table id='data-table-basic' class='table table-striped'>
                                                    <br>
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>ID Kelas</th>
                                                            <th>Masuk</th>
                                                            <th>Tidak Masuk</th>
                                                        </tr>
                                                    </thead>

                                                    <?php


                                                    if (isset($_GET['kelas'])) {
                                                        $kelas=trim($_GET['kelas']);
                                                        $sql="select * from tb_siswa where id_kelas='$kelas' order by nis asc";
                                                    }else {
                                                        $sql="select * from tb_siswa order by id_kelas asc";
                                                    }


                                                    $hasil=mysqli_query($koneksi,$sql);
                                                    $no=0;
                                                    while ($data = mysqli_fetch_array($hasil)) {
                                                        $no++;

                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo $no;?></td>
                                                                <td><?php echo $data["nis"]; ?></td>
                                                                <td><?php echo $data["nama"];   ?></td>
                                                                <td><?php echo $data["id_kelas"];   ?></td>
                                                                <td><input type="checkbox" name="yes[]" value="<?php echo $data["id_siswa"]; ?>" > </td>
                                                                <td><input type="checkbox" name="no[]" value="<?php echo $data["id_siswa"]; ?>" > </td>


                                                            </tr>
                                                        </tbody>
                                                        <?php
                                                    }
                                                    ?>
                                                </table>
                                                <button class="btn btn-login btn-success" type="submit" name="save" >Simpan</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                   if (isset($_GET['save'])) {
                       $date = date("Y-m-d");
                       $jam=date("H:i:s");
                       $mapel = $_GET["mapel"];
                       $koneksi = new mysqli("localhost","root","","db_monitoring");
                       $id=$_SESSION['guru'];

                       $ambil=$koneksi->query("SELECT * FROM tb_guru WHERE id_guru = $id "); 
                       while ($pecah=$ambil->fetch_assoc()) {
                        $guru= $pecah['id_guru'];

                    } 



                    foreach ($_GET['yes'] as $a => $id_siswa) {
                        if ($a = null) {

                        }

                        $ket = 1;
                        $insert = "insert into tb_absen values('','".$guru."','".$mapel."','".$id_siswa."','".$jam."','".$date."','".$ket."')";
                        $conn->query($insert)===TRUE;


                    }
                    foreach ($_GET['no'] as $b => $id_siswa) {
                        if ($b = null) {

                        }

                        $insert = "insert into tb_absen values('','".$guru."','".$mapel."','".$id_siswa."','".$jam."','".$date."','0')";
                        $conn->query($insert)===TRUE;

                    }
                    echo "<script>alert('Siswa Berhasil Diabsen')</script>";
                    echo "<script>location='absen_siswa.php';</script>";

                }

                ?>

            </body>

            </html>

