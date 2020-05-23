<?php 
include "pages/session.php";
include "koneksi.php";

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
    // DateTime
// $tanggal = '2005-09-01 09:02:23';
// $tanggal = new DateTime($tanggal); 
// $sekarang = new DateTime();
// $perbedaan = $tanggal->diff($sekarang);
//gabungkan
// echo $perbedaan->y.' selisih tahun.';
// echo $perbedaan->m.' selisih bulan.';
// echo $perbedaan->d.' selisih hari.';
// echo $perbedaan->h.' selisih jam.';
// echo $perbedaan->i.' selisih menit.';
    ?>

    <!-- end menu -->


    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">


                    <!-- fungsi -->

                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tugas Siswa</h2>
                            <div class='table-responsive'>
                                <table id='data-table-basic' class='table table-striped'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mapel</th>
                                            <th>Kelas</th>
                                            <th>Tanggal Tugas</th>
                                            <th>Batas Pengumpulan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                        <?php $nomor=1; ?>

                                        
                                        <?php 
                                        
                                        $id=$_SESSION['guru'];
                                        $get = $koneksi->query("SELECT * FROM tb_tugas join tb_mapel on tb_tugas.id_mapel = tb_mapel.id_mapel join tb_kelas on tb_tugas.id_kelas = tb_kelas.id_kelas where id_guru = $id"); 
                                         date_default_timezone_set("Asia/Jakarta");
                                         $tanggal= mktime(date("m"),date("d"),date("Y"));
                                         $tgl=date("Y-m-d", $tanggal);

                                        ?>

                                        <?php while ($row = $get->fetch_assoc()) {
                                         ?>
                                         <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $row['nama_mapel']; ?></td>
                                            <td><?php echo $row['kelas']; ?></td>
       
                                            <td><?php echo date("d M Y", strtotime($row['tanggal_tugas'])); ?></td>
                                            <td><?php echo date("d M Y", strtotime($row['batas_pengumpulan'])); ?></td>
                                         
                                            <td>
                                                <?php 
                                                $awal=$row['tanggal_tugas'];
                                                $akhir=$row['batas_pengumpulan'];
                                                $a= date("d", strtotime($row['tanggal_tugas']));
                                                $b= date("d", strtotime($row['batas_pengumpulan']));
                                                $c= $a-$b;

                                                if ($tgl >= $akhir) {
                                                    echo '<span class="badge badge-success">';
                                                    echo 'Tugas Berakhir';
                                                    echo '</span>';
                                                  
                                                }else{
                                                    
                                                    $tanggal = new DateTime($row['batas_pengumpulan']); 
                                                    $sekarang = new DateTime();
                                                    $perbedaan = $tanggal->diff($sekarang);
                                                    echo '<span class="badge badge-danger">';
                                                    echo 'Masa Aktif Tugas Sisa '. $perbedaan->d .' Hari ' . $perbedaan->h. ' jam';
                                                    echo '</span>';
                                                   



                                               }
                                            ?>

                                            

                                            </td>
                                            <td>


                                                <a href="#" class='open_modal' id='<?php echo  $row['id_tugas']; ?>'>View |</a>

                                                <a href="#" class='edit_modal' id='<?php echo  $row['id_tugas']; ?>'>Edit |</a>

                        
                                                <a href="#" onclick="confirm_modal('hapus_tugas.php?&id_tugas=<?php echo $row['id_tugas']; ?>');">Delete</a>
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php $nomor++; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Tugas</button>
                                        </div>
                                    </div>
                                    <!-- end fungsi -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- model tambah tugas -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- fungsi -->
                            <div class="form-example-wrap mg-t-30">
                                <div class="cmp-tb-hd cmp-int-hd">
                                    <h2>Tambah Tugas</h2>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Mapel</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <select name="mapel" class="form-control" required>
                                                            <?php  
                                                            $get = $koneksi->query("SELECT * FROM tb_mapel"); ?>
                                                            <option value="">--Pilih--</option>
                                                            <?php while ($row = $get->fetch_assoc()) { ?>

                                                            <option value="<?php echo $row['id_mapel']; ?>"> <?php echo $row['nama_mapel']; ?>
                                                            </option>
                                                            <?php } ?>
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
                                                    <label class="hrzn-fm">Kelas</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <select name="kelas" class="form-control" required>
                                                            <?php  
                                                            $get = $koneksi->query("SELECT * FROM tb_kelas"); ?>
                                                            <option value="">--Pilih--</option>
                                                            <?php while ($row = $get->fetch_assoc()) { ?>

                                                            <option value="<?php echo $row['id_kelas']; ?>"> <?php echo $row['kelas']; ?></option>
                                                            <?php } ?>
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
                                                    <label class="hrzn-fm">Batas Pengumpulan </label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="date" name="batas_pengumpulan" class="form-control input-sm" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Keterangan Tugas</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" name="keterangan_tugas" class="form-control input-sm"
                                                        placeholder="Enter Keterangan" required>
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
                                <br>
    

<?php
                                  $tanggal= mktime(date("m"),date("d"),date("Y"));
                                 $tgl1=date("Y-m-d", $tanggal);
                                 $id_guru=$_SESSION['guru'];
                                if (isset($_POST['save']))
                                {

                                  $koneksi->query("INSERT INTO tb_tugas
                                    (id_mapel,id_kelas,id_guru,tanggal_tugas,batas_pengumpulan,keterangan_tugas)
                                    VALUES ('$_POST[mapel]','$_POST[kelas]','$id_guru','$tgl1','$_POST[batas_pengumpulan]','$_POST[keterangan_tugas]')");
                                  echo "<script>alert('Data Berhasil diTambah')</script>";
                                  echo "<script>location='tugas_siswa.php';</script>";
                              }
                              ?>

                              <!-- end fungsi -->
                          </div>
                      </div>
                  </div>
              </div>
              <!-- end model tambah tugas -->


              <!-- modal view  -->
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

             
          </div>
              <!-- end modal vedit  -->


              <!-- Modal delete--> 
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

        <?php   
        include "pages/footer.php";

        ?>

        <?php include 'pages/script.php'; ?>   


        <script type="text/javascript">
         $(document).ready(function () {
             $(".open_modal").click(function(e) {
              var m = $(this).attr("id");
              $.ajax({
                 url: "detail_tugas.php",
                 type: "GET",
                 data : {id_tugas: m,},
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
                 url: "ubah_tugas.php",
                 type: "GET",
                 data : {id_tugas: m,},
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

