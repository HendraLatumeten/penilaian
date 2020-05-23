<?php
include 'koneksi.php';
$get=$koneksi->query("SELECT * FROM tb_catatan WHERE id_catatan='$_GET[id_catatan]'");
$row = $get->fetch_assoc();
$koneksi->query("DELETE FROM tb_catatan WHERE id_catatan='$_GET[id_catatan]'");
echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='catatan_siswa.php';</script>";
?>