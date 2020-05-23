
<?php

include "koneksi.php";

    $id=$_GET['id_catatan'];
    $db_monitoring=$koneksi->query("SELECT * FROM tb_catatan JOIN tb_guru ON tb_catatan.id_guru=tb_guru.id_guru JOIN tb_siswa ON tb_catatan.id_siswa=tb_siswa.id_siswa WHERE id_catatan='$id'");
    while($pecah=mysqli_fetch_array($db_monitoring)){
?>


<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Catatan Siswa</h4>
        </div>

        <div class="modal-body">
            <form action="" name="modal_popup" enctype="multipart/form-data" method="POST">

    <table class="table">

        <tr>
            <td>Nama Guru</td>
            <td>:</td>
            <td><?php echo $pecah['nama_guru'] ?></td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td>:</td>
            <td><?php echo $pecah['nama'] ?></td>
        </tr>
        <tr>
            <td>Isi Catatn</td>
            <td>:</td>
            <td><?php echo $pecah['isi_catatan'] ?></td>
        </tr>
    </table>

                </form>

             <?php } ?>

            </div>

           
        </div>
    </div>