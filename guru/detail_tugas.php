
<?php

include "koneksi.php";

    $id=$_GET['id_tugas'];
    $db_monitoring=$koneksi->query("SELECT * FROM tb_tugas JOIN tb_guru ON tb_tugas.id_guru=tb_guru.id_guru JOIN tb_mapel ON tb_tugas.id_mapel=tb_mapel.id_mapel JOIN tb_kelas ON tb_tugas.id_kelas=tb_kelas.id_kelas WHERE id_tugas='$id'");
    while($pecah=mysqli_fetch_array($db_monitoring)){
?>

<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Tugas Siswa</h4>
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
            <td>Mata Pelajaran</td>
            <td>:</td>
            <td><?php echo $pecah['nama_mapel'] ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?php echo $pecah['kelas'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Diberikan</td>
            <td>:</td>
            <td><?php echo $pecah['tanggal_tugas'] ?></td>
        </tr>

        <tr>
            <td>Tanggal Pengumpulan</td>
            <td>:</td>
            <td><?php echo $pecah['batas_pengumpulan'] ?></td>
        </tr>

         <tr>
            <td>Keterangan Tugas</td>
            <td>:</td>
            <td><?php echo $pecah['keterangan_tugas'] ?></td>
        </tr>
    </table>

                </form>

             <?php } ?>

            </div>

           
        </div>
    </div>