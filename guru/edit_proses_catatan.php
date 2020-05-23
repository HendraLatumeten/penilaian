
<?php 
include "koneksi.php";


    $id=$_POST['id_catatan'];
    $isi_catatan=$_POST['isi_catatan'];
    $id_guru=$_POST['id_guru'];
    $id_siswa=$_POST['id_siswa'];

    $koneksi->query("UPDATE tb_catatan SET id_guru='$id_guru', id_siswa='$id_siswa', isi_catatan='$isi_catatan'  WHERE id_catatan='$id'");
     echo "<script>alert('Data Berhasil diUbah')</script>";
     echo "<script>location='catatan_siswa.php';</script>";

?>

