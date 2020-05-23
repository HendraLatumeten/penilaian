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
    ?>
    <!-- end menu -->

</div>
<!-- Main Menu area End-->
<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<!-- fungsi  -->
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Catatan Siswa</h2>
                        <div class='table-responsive'>
                            <table id='data-table-basic' class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>




                                    <?php $nomor=1; ?>


                                    <?php 

                                    $id=$_SESSION['guru'];
                                    $get = $koneksi->query("SELECT * FROM tb_catatan join tb_siswa on tb_catatan.id_siswa = tb_siswa.id_siswa where id_guru = $id"); ?>
                                    <?php while ($row = $get->fetch_assoc()) {
                                     ?>
                                     <tr>
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['isi_catatan']; ?></td>
                                        <td>
                                           <!--  <a href="index.php?page=lihat_catatan&id= <?php echo $row['id_catatan']; ?>"
                                                class="btn btn-success"><i class="notika-icon notika-eye"></i></a>

                                                <a href="index.php?page=ubah_catatan&id= <?php echo $row['id_catatan']; ?>"
                                                    class="btn btn-warning"><i class="notika-icon notika-edit"></i></a>

                                                    <a href="index.php?page=hapus_catatan&id= <?php echo $row['id_catatan']; ?>"
                                                        class="btn btn-danger"><i class="notika-icon notika-trash"></i></a> -->
                                                <a href="#" class='open_modal' id='<?php echo  $row['id_catatan']; ?>'>View |</a>

                                                <a href="#" class='edit_modal' id='<?php echo  $row['id_catatan']; ?>'>Edit |</a>

                        
                                                <a href="#" onclick="confirm_modal('hapus_catatan.php?&id_catatan=<?php echo $row['id_catatan']; ?>');">Delete</a>
                                        </td>
                                                </tr>
                                                <?php $nomor++; ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Catatan</button>
                                    </div>
                                </div>


<!-- end fungsi -->
<!-- tambah catatan -->
                                <?php
                                // include 'koneksi.php';

                                $sql = "select * from tb_kelas";
                                $result = mysqli_query($koneksi,$sql);  

                                $sql_siswa = "select * from tb_siswa";
                                $result_siswa = mysqli_query($koneksi,$sql_siswa);  
                                ?>
<!-- modal tambah data -->
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- fungsi -->
                                        <div class="form-example-wrap mg-t-30">
                                            <div class="cmp-tb-hd cmp-int-hd">
                                                <h2>Tambah Catatan</h2>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">Kelas</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">

                                                                    <select name="" id="combo_kelas" class="form-control">
                                                                        <option value="">--Pilih--</option>

                                                                        <?php
                                                                        while($row=mysqli_fetch_assoc($result)){
                                                                            echo'<option value="'.$row['id_kelas'].'">'.$row['kelas'].'</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="hrzn-fm">Siswa</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                                <div class="nk-int-st">
                                                                    <select name="combo_siswa" id="combo_siswa"  class="form-control">
                                                                        <?php
                                                                        while($row=mysqli_fetch_assoc($result_siswa)){
                                                                            echo'<option class="dt '.$row['id_kelas'].'" value="'.$row['id_siswa'].'">'.$row['nama'].'</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-example-int form-horizental">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <div class="nk-int-st">
                                                                        <textarea class="form-control" rows="5" name="isi_catatan" placeholder="Berikan Catatan Untuk Siswa"></textarea>
                                                                    </div>
                                                                  <?php $id=$_SESSION['guru']; ?>
                                                                  <input type="hidden" name="guru" value="<?php echo "$id"  ?>" class="form-control input-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-example-int mg-t-15">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                            <button class="btn btn-success notika-btn-success waves-effect" name="save">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- end catatan -->

                                            <?php
                                            if (isset($_POST['save']))
                                            {

                                              $koneksi->query("INSERT INTO tb_catatan
                                                (id_siswa,isi_catatan,id_guru)
                                                VALUES ('$_POST[combo_siswa]','$_POST[isi_catatan]','$_POST[guru]')");
                                             echo "<script>alert('Data Berhasil diTambah')</script>";
                                             echo "<script>location='catatan_siswa.php';</script>";
                                          }
                                          ?> 
                                        <!-- end fungsi -->
                                    </div>
                                </div>
                            </div>
                        </div>
<!-- end modal tambah data -->

<div id="ModalView" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<!-- end modal view  -->

<!-- modal edit  -->
<div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    </div>
</div>
</div>

      <div class="modal fade" id="modal_delete">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top:100px;">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="text-align:center;">Apakah anda ingin menghapus data ini ?</h4>
                    </div>

                    <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>



                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
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
    <script src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var combo_siswa = $("#combo_siswa");

            temp = combo_siswa.children(".dt").clone();
            $("#combo_kelas").change(function () {
                var value = $(this).val();
                combo_siswa.children(".dt").remove();
                if (value !== '') {
                    temp.clone().filter("." + value).appendTo(combo_siswa);
                } else {
                    temp.clone().appendTo(combo_siswa);
                }
            });
        });
    </script>

     <script type="text/javascript">
         $(document).ready(function () {
             $(".open_modal").click(function(e) {
              var m = $(this).attr("id");
              $.ajax({
                 url: "detail_catatan.php",
                 type: "GET",
                 data : {id_catatan: m,},
                 success: function (ajaxData){
                     $("#ModalView").html(ajaxData);
                     $("#ModalView").modal('show',{backdrop: 'true'});
                 }
             });
          });
         });
     </script>

        <script type="text/javascript">
         $(document).ready(function () {
             $(".edit_modal").click(function(e) {
              var m = $(this).attr("id");
              $.ajax({
                 url: "ubah_catatan.php",
                 type: "GET",
                 data : {id_catatan: m,},
                 success: function (ajaxData){
                     $("#ModalEdit").html(ajaxData);
                     $("#ModalEdit").modal('show',{backdrop: 'true'});
                 }
             });
          });
         });
     </script>

        <script type="text/javascript">
        function confirm_modal(delete_url)
        {
          $('#modal_delete').modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href' , delete_url);
      }
  </script>

</body>

</html>

