
<div class="container">
<div class="form-example-wrap mg-t-30">
    <div class="cmp-tb-hd cmp-int-hd">
        <h2>Form Ubah Catatan</h2>
    </div>


    <form method="post" action="edit_proses_catatan.php" enctype="multipart/form-data">
  
        <?php
        include 'koneksi.php';
        $id=$_GET['id_catatan'];
$get=$koneksi->query ("SELECT * FROM tb_catatan WHERE id_catatan='$id'");
$row=$get->fetch_assoc();

?>

        <div class="form-example-int form-horizental">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                        <label class="hrzn-fm">Isi Catatan :</label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                                 <textarea class="form-control" rows="5" name="isi_catatan" placeholder="Berikan Catatan Untuk Siswa"><?php echo $row["isi_catatan"]; ?></textarea>
                                 <input type="hidden" name="id_catatan" value="<?php echo $row["id_catatan"]; ?>">
                      
                                 <input type="hidden" name="id_guru" value="<?php echo $row["id_guru"]; ?>">
                         
                                 <input type="hidden" name="id_siswa" value="<?php echo $row["id_siswa"]; ?>">

                                
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
                    <button class="btn btn-success notika-btn-success waves-effect" type="submit">Ubah</button>
                </div>
            </div>
        </div>
        </div>
    </form>

    
