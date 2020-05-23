<?php
session_start();
$koneksi = new mysqli("localhost","root","","db_monitoring");


if (!isset($_SESSION['guru']))
{
  echo"<script>alert('Anda Harus Login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>