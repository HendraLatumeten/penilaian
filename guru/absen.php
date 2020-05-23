<?php
session_start();
if(!isset($_SESSION['guru'])){
    die("<b>Oops!</b> Access Failed.
        <p>Sistem Logout. Anda harus melakukan Login kembali.</p>
        <button type='button' onclick=location.href='index.php'>Back</button>");
}
?>

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
                                    <a data-toggle="collapse"  href="inbox.html">Home</a>
                                    
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Email</a>
                                    <!-- <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="inbox.html">Inbox</a></li>
                                        <li><a href="view-email.html">View Email</a></li>
                                        <li><a href="compose-email.html">Compose Email</a></li> -->
                                    </ul>
                                </li>
                               <!--  <li><a data-toggle="collapse" data-target="#democrou" href="#">Interface</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="animations.html">Animations</a></li>
                                        <li><a href="google-map.html">Google Map</a></li>
                                        <li><a href="data-map.html">Data Maps</a></li>
                                        <li><a href="code-editor.html">Code Editor</a></li>
                                        <li><a href="image-cropper.html">Images Cropper</a></li>
                                        <li><a href="wizard.html">Wizard</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Charts</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="flot-charts.html">Flot Charts</a></li>
                                        <li><a href="bar-charts.html">Bar Charts</a></li>
                                        <li><a href="line-charts.html">Line Charts</a></li>
                                        <li><a href="area-charts.html">Area Charts</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Tables</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="normal-table.html">Normal Table</a></li>
                                        <li><a href="data-table.html">Data Table</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Forms</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="form-elements.html">Form Elements</a></li>
                                        <li><a href="form-components.html">Form Components</a></li>
                                        <li><a href="form-examples.html">Form Examples</a></li>
                                    </ul>
                                </li> -->
                               <!--  <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">App views</a>
                                    <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                        <li><a href="notification.html">Notifications</a>
                                        </li>
                                        <li><a href="alert.html">Alerts</a>
                                        </li>
                                        <li><a href="modals.html">Modals</a>
                                        </li>
                                        <li><a href="buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="tabs.html">Tabs</a>
                                        </li>
                                        <li><a href="accordion.html">Accordion</a>
                                        </li>
                                        <li><a href="dialog.html">Dialogs</a>
                                        </li>
                                        <li><a href="popovers.html">Popovers</a>
                                        </li>
                                        <li><a href="tooltips.html">Tooltips</a>
                                        </li>
                                        <li><a href="dropdown.html">Dropdowns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages</a>
                                    <ul id="Pagemob" class="collapse dropdown-header-top">
                                        <li><a href="contact.html">Contact</a>
                                        </li>
                                        <li><a href="invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                        <li><a href="color.html">Color</a>
                                        </li>
                                        <li><a href="login-register.html">Login Register</a>
                                        </li>
                                        <li><a href="404.html">404 Page</a>
                                        </li>
                                    </ul>
                                </li> -->
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
                        <li >
                          
                            <a  href="home.php?&id=<?php echo $pecah['id_guru']; ?>"><i class="notika-icon notika-house"></i> Home</a>
                        </li>

                        <li class="active" >
                            <a  href="absen_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i class="notika-icon notika-edit active"></i>Absen Siswa</a>
                        </li>
                        <li>
                            <a  href="nilai_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i class="notika-icon notika-form"></i>Nilai  Siswa</a>
                        </li>
                        <li>
                            <a  href="tugas_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i class="notika-icon notika-bar-chart"></i>Tugas Siswa</a>
                        </li>
                        <li>
                            <a  href="kegiatan_siswa.php?&id=<?php echo $pecah['id_guru']; ?>"><i class="notika-icon notika-windows"></i>Kegiatan Siswa</a>
                        </li>
                       <!--  <li>
                            <a  href="absen_siswa.php"><i class="notika-icon notika-edit"></i>Absen Siswa</a>
                        </li> -->
                       <!--  <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Interface</a>
                        </li>
                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Charts</a>
                        </li>
                        <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Tables</a>
                        </li>
                        <li><a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> Forms</a>
                        </li>
                        <li><a data-toggle="tab" href="#Appviews"><i class="notika-icon notika-app"></i> App views</a>
                        </li>
                        <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-support"></i> Pages</a>
                        </li> -->
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
 
       <?php 
    $koneksi = new mysqli("localhost","root","","db_monitoring");
     ?>

<?php 



     





 ?>
<?php
$id=$_SESSION['guru'];
    
     $ambil=$koneksi->query("SELECT * FROM tb_guru WHERE id_guru = $id "); 
     while ($pecah=$ambil->fetch_assoc()) {
        $nama = $pecah['nama_guru'];

         

//mengambil koneksi dari koneksi.php

//mengambil value dari nim table siswa di tampilkan dalam bentuk checkbox
echo "<form action='' method='get'>";
  
echo '<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Absensi Siswa Kelas 6 </h2>
                            <p>Mengisi Sesuai Kehadiran Siswa</p>
                            <p>Nama Guru : <b>'.$nama.'</b> </p>
                            <p>';



            $tanggal= mktime(date("m"),date("d"),date("Y"));
            echo "Tanggal ".": "."<b>".date("d-M-Y", $tanggal)."</b>";
            date_default_timezone_set("Asia/Jakarta");
            $jam=date("H:i:s");
            echo " | Pukul : <b>". $jam." "."</b>";
            $a = date ("H");
            echo ' <div class="row">
                              <div class="form-group col-md-3">
                                      <label>Pelajaran:</label>
                                 <select name="mapel" class="form-control" required>
                                  <option value="">--Pilih--</option>
                                       <option value="matematika">Metematika</option>
                                       <option value="bhs.inggris">Bhs.Inggris</option>
                                       <option value="bhs.indonesia">Bhs.Indonesia</option>
                                </select> 
                              </div>';
        echo "</div>";
 } 
    echo "<div class='table-responsive'>
                            <table id='data-table-basic' class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>                                     
                                        <th>Hadir</th>
                                        <th>Tidak Hadir</th>
                                    </tr>
                                </thead>";

$conn = new mysqli("localhost","root","","db_monitoring");
if (!$conn) {
 die("connection failed".$conn->connect_error());
}
//
$sql="select nis,nama from tb_siswa";
$result = $conn->query($sql);
if ($result->num_rows>0) {

 $no = 1;
 $tanggal= mktime(date("m"),date("d"),date("Y"));
 while ($row = $result->fetch_assoc()) {

    echo "<tbody>";
    echo '<tr>'; 
  echo '<td>'.$no.'</td>'; 


 echo  "<td>".$row['nis']."</td>". "<td>".$row['nama']."</td>"."<td>"."<input type='checkbox' name='yes[]' value='".$row['nis']."'"."</td>"."<td>"."<input type='checkbox' name='no[]' value='".$row['nis']."'/></br>"."</td>";
  $no++;

 }
 echo "</tr>";
 echo "</tbody>";
 echo "</table>";
echo ' <button class="btn btn-login btn-success" type="submit" name="submit" >Simpan</button>';
 echo "</form>";

 echo "</div>";
  echo "</div>";
 echo "</div>";
  echo "</div>";
   echo "</div>";
    echo "</div>";
}
//proses memasukkan absensi
if (isset($_GET['submit'])) {
 $date = date("Y-m-d");
$jam=date("H:i:s");
$mapel = $_GET["mapel"];
$koneksi = new mysqli("localhost","root","","db_monitoring");
     $id=$_SESSION['guru'];
    
     $ambil=$koneksi->query("SELECT * FROM tb_guru WHERE id_guru = $id "); 
     while ($pecah=$ambil->fetch_assoc()) {
        $guru= $pecah['id_guru'];
       
         } 
                         


 foreach ($_GET['yes'] as $a => $nis) {
if ($a = null) {
  
}

$ket = 1;
  $insert = "insert into tb_absen values('','".$guru."','".$mapel."','".$nis."','".$jam."','".$date."','".$ket."')";
  $conn->query($insert)===TRUE;
  
 
}
 foreach ($_GET['no'] as $a => $nis) {
if ($a = null) {

  }

   $insert = "insert into tb_absen values('','".$guru."','".$mapel."','".$nis."','".$jam."','".$date."','0')";
    $conn->query($insert)===TRUE;

}
    echo "<script>alert('Data Berhasil diupdate')</script>";
    echo "<script>location='absen_siswa.php';</script>";
 
}

//menutup koneksi
$conn->close();
?>
                </div>
              
            </div>
        </div>
    </div>

  
