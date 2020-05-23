
<?php 
    $host="localhost";
    $user="root";
    $pass="";
    mysql_connect($host,$user,$pass) or die("Error Connect DB ".mysql_error());
    mysql_select_db("db_monitoring") or die("Database Tidak Ada. ".mysql_error());

     $id_mapel= $_POST['mapel1'];
     $id_kelas= $_POST['kelas1'];
     $bp= $_POST['batas_pengumpulan1'];
     $kt= $_POST['keterangan_tugas1'];
    $id= $_POST['id_tugas'];

    $db_monitoring=mysql_query("UPDATE tb_tugas SET id_mapel='$id_mapel', id_kelas='$id_kelas', batas_pengumpulan='$bp', keterangan_tugas='$kt' WHERE id_tugas = '$id'");
     echo "<script>alert('Data Berhasil diUbah')</script>";
     echo "<script>location='tugas_siswa.php';</script>";

?>