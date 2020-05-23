<div class="form-example-wrap mg-t-30">
    <div class="cmp-tb-hd cmp-int-hd">
        <h2>Form Tambah Tugas</h2>
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
                            <select name="mapel" class="form-control">
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
                            <select name="kelas" class="form-control">


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
                        <label class="hrzn-fm">Tanggal Tugas </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <input type="date" name="tanggal_tugas" class="form-control input-sm">

                            <?php $id=$_SESSION['guru']; ?>
                            <input type="hidden" name="guru" value="<?php echo "$id"  ?>" class="form-control input-sm">
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
                            <input type="date" name="batas_pengumpulan" class="form-control input-sm">
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
                                placeholder="Enter Keterangan">
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
if (isset($_POST['save']))
{
 
  $koneksi->query("INSERT INTO tb_tugas
    (id_mapel,id_kelas,tanggal_tugas,batas_pengumpulan,keterangan_tugas,id_guru)
    VALUES ('$_POST[mapel]','$_POST[kelas]','$_POST[tanggal_tugas]','$_POST[batas_pengumpulan]','$_POST[keterangan_tugas]','$_POST[guru]')");
  echo "<div class='alert alert-info'>Data Tersimpan</div>";
  echo "<meta http-equiv='refresh' content='1;url=index.php?page=tugas_siswa'>";
}
?>