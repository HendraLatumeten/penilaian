<?php
//mengambil koneksi dari koneksi.php
$conn = new mysqli("localhost","root","","db_monitoring");
if (!$conn) {
 die("connection failed".$conn->connect_error());
}
//mengambil value dari nis table siswa di tampilkan dalam bentuk checkbox
$sql="select nis,nama from tb_siswa";
$result = $conn->query($sql);
if ($result->num_rows>0) {
 echo "<form action='' method='get'>";
 $no = 0;
 while ($row = $result->fetch_assoc()) {
  echo $row['nis']." ".$row['nama']."<input type='checkbox' name='nis[]' value='".$row['nis']."'/><br/>";
  $no++;
 }
 echo "<input type='submit' name='submit'/></form>";
}
//proses memasukkan absensi
if (isset($_GET['submit'])) {
 $date = date("Y-m-d");
 echo $date."<br/>";
 $ket = 1;
 foreach ($_GET['nis'] as $nis) {
  $insert = "insert into tb_absen values('','','".$nis."','','','".$date."','".$ket."')";
  if ($conn->query($insert)===TRUE) {
  }
  else{
   echo "error".$insert."<br/>".$conn->error;
  }
 }
}
//menutup koneksi
$conn->close();
?>