<?php
include "koneksi.php";
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

$username = $_POST['username'];
$password     = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) & !ctype_alnum($password)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
$login=mysqli_query($konek,"SELECT * FROM tb_guru WHERE username='$username' AND password='$password'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";
  $_SESSION['id_guru']      = $r['id_guru'];
  $_SESSION['nama']         = $r['nama'];
  $_SESSION['id_kelas']     = $r['id_kelas'];
  $_SESSION['leveluser']    = $r['level'];
 
  
  // session timeout
  $_SESSION[login] = 2;
  timer();

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysqli_query($konek,"UPDATE tb_guru SET id_session='$sid_baru' WHERE username='$username'");
  header('location:home.php');
}
else{
    echo "<script>alert('USERNAME DAN NISN ANDA SALAH, SILAHKAN LOGIN KEMBALI');</script>";
     echo "<script>location='index.php'</script>";
}
}
?>
