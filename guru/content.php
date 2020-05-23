<?php
include "koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/class_paging.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='guru'){
   $jam=date("H:i:s");
   $tgl=tgl_indo(date("Y m d"));
   echo'<div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active">
                            <a  href="home.php?&id=$id"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li >
                            <a  href="absen_siswa.php"><i class="notika-icon notika-edit active"></i>Absen Siswa</a>
                        </li>
                        <li>
                            <a  href="absen_siswa.php"><i class="notika-icon notika-form"></i>Nilai  Siswa</a>
                        </li>
                        <li>
                            <a  href="absen_siswa.php"><i class="notika-icon notika-bar-chart"></i>Tugas Siswa</a>
                        </li>
                        <li>
                            <a  href="absen_siswa.php"><i class="notika-icon notika-windows"></i>Kegiatan Siswa</a>
                        </li>
                    
                    </ul>
                   
                    </div>
                </div>
            </div>
        </div>'; 
 echo'   <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2020 KlinikCoding 
. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>';   
}
// elseif ($_SESSION['leveluser']=='guru'){
//   $jam=date("H:i:s");
//   $tgl=tgl_indo(date("Y m d")); 
//   echo"<br><div class='row'>
//  <div class='col-sm-3'>
//    <p align='center'><h1>Welcome</h1></p> 
//    <p><h3> Aplikasi Pendaftaran Dan Ujian Penerimaan Murid Baru Berbasis Web Pada Sekolah Smp Islam Terpadu Permata Madani</h3></p>
//  </div>
//  <div class='col-sm-7'>
//   Hai <b>$_SESSION[namalengkap]</b>, Selamat datang di halaman Administrator. 
//   <br />Anda Berhak Mengelola Menu Sesuai Jabatan Anda sebagai <b>$_SESSION[jabatan]</b>
//   <br />Silahkan klik menu pilihan yang berada di bagian header untuk mengelola sistem Aplikasi Ini. <br /> <b>$hari_ini, $tgl, $jam </b>WIB      

// </div>
// <div class='col-sm-2'>
//  <img src='images/icon-guru.jpg' alt='' width='100%' class='hidden-phone'>
// </div>
// </div>";
// echo"  <div class='page-header'></div>
// <div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
//   <ol class='carousel-indicators'>
//     <li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
//     <li data-target='#carousel-example-generic' data-slide-to='1'></li>
//     <li data-target='#carousel-example-generic' data-slide-to='2'></li>
//   </ol>
//   <div class='carousel-inner' role='listbox'>
//     <div class='item active'>
//       <img src='images/slides/logo.png' alt='First slide'>
//     </div>
//     <div class='item'>
//       <img src='images/slides/slide4.jpg' alt='First slide'>
//     </div>
//   </div>
//   <a class='left carousel-control' href='#carousel-example-generic' role='button' data-slide='prev'>
//     <span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
//     <span class='sr-only'>Previous</span>
//   </a>
//   <a class='right carousel-control' href='#carousel-example-generic' role='button' data-slide='next'>
//     <span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
//     <span class='sr-only'>Next</span>
//   </a>
// </div>";  

// }
// elseif ($_SESSION['leveluser']=='siswa'){
//   $jam=date("H:i:s");
//   $tgl=tgl_indo(date("Y m d")); 
//   echo"<br><div class='row'>
//   <div class='col-sm-3'>
//    <p align='center'><h1>Welcome To</h1></p> 
//    <p><h3> Aplikasi Pendaftaran Dan Ujian Penerimaan Murid Baru Berbasis Web Pada Sekolah Smp Islam Terpadu Permata Madani.</h3></p>
//  </div>
//  <div class='col-sm-7'>
//   Hai <b>$_SESSION[namalengkap]</b>, Selamat datang di halaman Tes Penerimaan Murid Baru Berbasis Web Pada Sekolah Smp Islam Terpadu Permata Madani.</b>
//   <br />Silahkan Pilih Test Yang Tersedia Untuk <b>Calon Siswa</b>
//   <br />Dan menu pilihan yang berada di bagian header untuk mengelola sistem Aplikasi Ini. <br /> <b>$hari_ini</b>, <b>$tgl </b>, Pukul <b>$jam </b>WIB     
// </div>
// <div class='col-sm-2'>
//  <img src='images/icon-siswa.png' alt='' width='100%' class='hidden-phone'>
// </div>
// </div>
// </div>";

  

}
}

// Bagian User
elseif ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='guru' OR $_SESSION[leveluser]=='guru'){
    include "modul/mod_guru/absen_siswa.php";
  }
}

// Bagian Menu Utama
elseif ($_GET['module']=='menuutama'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='guru' OR $_SESSION[leveluser]=='siswa'){
    include "modul/mod_menuutama/menuutama.php";
  }
}

// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_submenu/submenu.php";
  }
}

// Bagian Kategori
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Daftar Pertanyaan
elseif ($_GET['module']=='pertanyaan'){
  if ($_SESSION['leveluser']=='guru'){
    include "modul/mod_pertanyaan/pertanyaan.php";
  }
}


// Bagian Hasil Test
elseif ($_GET['module']=='hasiltest'){
  if ($_SESSION['leveluser']=='guru'){
    include "modul/mod_hasiltest/hasiltest.php";
  }
}




//Bagian Cetak Hasil Test
elseif ($_GET['module']=='report'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_report/cetak.php";
  }
}

// Bagian Daftar Tes Aktif
elseif ($_GET['module']=='daftar_test'){
  if ($_SESSION['leveluser']=='siswa'){
    include "modul/mod_daftar_test/daftar_test.php";
  }
}
// Bagian Daftar Tes Aktif
elseif ($_GET['module']=='test'){
  if ($_SESSION['leveluser']=='siswa'){
    include "modul/mod_daftar_test/test.php";
  }
}
// Bagian Reset
elseif ($_GET['module']=='reset'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_reset/reset.php";
  }
}






// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
</table>

<script type="text/javascript">
  $('#myHTMLTable').convertToFusionCharts({
    swfPath: "Charts/",
    type: "MSColumn3D",
    data: "#myHTMLTable",
    dataFormat: "HTMLTable"
  });
</script>
