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

        ?>
        <!-- end menu -->

    </div>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <h4>Selamat Datang di Sistem Informasi Monitoring Murid Berbasis Web Pada SD Ciater 1</h4>
                        
                        <div class="form-element-list">
                            <div class="col-md-12">
                                <table class="table">
                                <tr>
                                   
                                        <td>NIP</td>
                                        <td>:</td>
                                        <td><?php echo $pecah['nip']; ?>

                                           
                                        
                                    </tr>
                                    <tr>
                                    
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?php echo $pecah['nama_guru']; ?></td>
                                       
                                    
                                </tr>
                                <tr>
                                
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?php echo $pecah['jk']; ?></td>
                                   
                                
                            </tr>

                            <tr>
                            
                                <td>Agama</td>
                                <td>:</td>
                                <td><?php echo $pecah['agama']; ?></td>
                               
                            
                        </tr>
                        <tr>
                           
                                <td>Golongan</td>
                                <td>:</td>
                                <td><?php echo $pecah['golongan']; ?></td>
                               
                            
                        </tr>

                    </div>
    
                        <tr>
                           
                                <td>ID</td>
                                <td>:</td>
                                <td><?php echo $pecah['id_guru']; ?></td>
                               
                            
                        </tr>
                        <tr>
                           
                                <td>Username</td>
                                <td>:</td>
                                <td><?php echo $pecah['username']; ?></td>
                               
                            
                        </tr>
                        <tr>
                           
                                <td>Password</td>
                                <td>:</td>
                                <td><?php echo $pecah['password']; ?></td>
                               
                            
                        </tr>
                        <tr>
                           
                                <td>Tlp</td>
                                <td>:</td>
                                <td><?php echo $pecah['telepon']; ?></td>
                               
                            
                        </tr>
                        <tr>
                           
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo $pecah['alamat']; ?></td>
                               
                            
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalfour">Akses Login</button></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </div>
      </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal animated bounce" id="myModalfour" role="dialog">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h1>Ubah Data Akses</h1>
                <hr>
                <form method="post">
                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm"><b>Username </b></label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="text" name="username" class="form-control input-sm" value="<?php echo $pecah['username']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-example-int form-horizental">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    <label class="hrzn-fm"><b>Password </b></label>
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="nk-int-st">
                                        <input type="password" name="password" class="form-control input-sm" value="<?php echo $pecah['password']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
             <!--        <button type="submit" name="save" class="btn btn-default" data-dismiss="modal">Save changes</button>
 -->                    <button class="btn btn-success notika-btn-success waves-effect" name="save">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>

<?php } ?>
<?php   
include "pages/footer.php";


?>

<?php include 'pages/script.php'; ?>   
<?php 
if (isset($_POST['save']))
{ 
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $id=$_SESSION['guru'];
    $koneksi->query("UPDATE tb_guru SET username ='$user', password='$pass' WHERE id_guru='$id'");
  echo "<script>alert('Data Berhasil diubah')</script>";
  echo "<script>location='index.php';</script>";
}
?>

</body>

</html>

