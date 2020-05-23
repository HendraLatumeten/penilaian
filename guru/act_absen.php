
<?php 
if (isset($_GET['submit'])) {
   $date = date("Y-m-d");
   $jam=date("H:i:s");
   $mapel = $_GET["mapel"];
   $koneksi = new mysqli("localhost","root","","db_monitoring");
   $id=$_SESSION['guru'];

   $ambil=$koneksi->query("SELECT * FROM tb_guru WHERE id_guru = $id "); 
   while ($pecah=$ambil->fetch_assoc()) {
    $guru= $pecah['id_guru'];

} 



foreach ($_GET['yes'] as $a => $nis) {
    if ($a = null) {

    }

    $ket = 1;
    $insert = "insert into tb_absen values('','1','1','1','1','1','1')";
    $koneksi->query($insert)===TRUE;


}
foreach ($_GET['no'] as $a => $nis) {
    if ($a = null) {

    }

   $insert = "insert into tb_absen values('','1','1','1','1','1','1')";
    $koneksi->query($insert)===TRUE;

}
echo "<script>alert('Data Berhasil diupdate')</script>";
echo "<script>location='absen_siswa.php';</script>";

}

?>