
<?php
    include "koneksi.php";


    $id=$_GET['id_tugas'];
    $db_monitoring=$koneksi->query("SELECT * FROM tb_tugas JOIN tb_guru ON tb_tugas.id_guru=tb_guru.id_guru JOIN tb_mapel ON tb_tugas.id_mapel=tb_mapel.id_mapel JOIN tb_kelas ON tb_tugas.id_kelas=tb_kelas.id_kelas WHERE id_tugas='$id'");
    while($pecah=mysqli_fetch_array($db_monitoring)){


?>

 <div class="form-example-wrap mg-t-30">
        <div class="cmp-tb-hd cmp-int-hd">
            <h2>Form Ubah Tugas</h2>
        </div>


        <form action="edit_proses.php" method="post" enctype="multipart/form-data">

            <div class="form-example-int form-horizental">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                            <label class="hrzn-fm">Mapel</label>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                            <div class="nk-int-st">
                                <select name="mapel1" class="form-control">
                                    <?php  
                                    $tugas = $_GET['id_tugas'];
                                    $get = $koneksi->query("SELECT * FROM tb_mapel ");
                                    $get1 = $koneksi->query("SELECT * FROM tb_tugas where id_tugas='$tugas' ");
                                    $id1 = $get1->fetch_assoc();
                                    $id= $id1['id_mapel'];
                                    ?>

                                    <option value="">--Pilih--</option>
                                    <?php while ($row = $get->fetch_assoc()) { ?>

                                    <option value="<?php echo $row['id_mapel']; ?>" <?php if($row['id_mapel'] == $id ){ echo 'selected'; } ?>> <?php echo $row['nama_mapel'] ?>  </option>
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
                            <select name="kelas1" class="form-control">


                                <?php  
                                $tugas = $_GET['id_tugas'];
                                $get = $koneksi->query("SELECT * FROM tb_kelas");
                                $get1 = $koneksi->query("SELECT * FROM tb_tugas where id_tugas='$tugas' ");
                                $id1 = $get1->fetch_assoc();
                                $id= $id1['id_kelas']; 
                                ?>
                                <option value="">--Pilih--</option>
                                <?php while ($row = $get->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas'] == $id ){ echo 'selected'; } ?>> <?php echo $row['kelas']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        $get = $koneksi->query ("SELECT * FROM tb_tugas WHERE id_tugas= '$_GET[id_tugas]' ");
        $row = $get->fetch_assoc(); ?>
        <div class="form-example-int form-horizental">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                        <label class="hrzn-fm">Batas Pengumpulan </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <input type="date" name="batas_pengumpulan1" value="<?php echo $row["batas_pengumpulan"]?>" class="form-control input-sm">
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
                            <input type="text" name="keterangan_tugas1" value="<?php echo $row["keterangan_tugas"] ?>" class="form-control input-sm"
                            placeholder="Enter Keterangan">
                             <input type="hidden" name="id_tugas" value="<?php echo $row["id_tugas"] ?>" class="form-control input-sm"
                            placeholder="Enter Keterangan">
                        </div>
                    </div>

                </div>
                 <div class="row">
                    <div class="col-md-6">
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">
                        Confirm
                    </button>

                    <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                        Cancel
                    </button>
                </div>
                </div>
                </div>

            </div>
        </div>
       
                </form>

    <?php } ?>

            </div>

           
        </div>
    </div>