<?php
     include "koneksi.php";
     
	$id_tugas=$_GET['id_tugas'];
    $koneksi->query("Delete FROM tb_tugas WHERE id_tugas='$id_tugas'");
    echo "<script>alert('Data Terhapus);</script>";
	header('location:tugas_siswa.php');
?>

