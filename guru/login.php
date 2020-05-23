<?php
ob_start();
session_start();
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
<?php include 'pages/head.php'; ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">

        <!-- Login -->
        <div class="nk-block toggled" id="l-login">

               <a href="#"><img src="../img/logo/logo3.png" alt="" /></a>

               <h1>Login Guru</h1>
               <br>
            <form  action="" method="post">
            <div class="nk-form">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <br>
                <!-- <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                </div> -->
                <button class="btn btn-success" name="login" >Login</button>
            
            </div>

                    </form> 
           <!--  <div class="nk-navigation nk-lg-ic">
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div> -->
        </div>

        

        
    </div>
<?php include 'pages/script.php'; ?>   
</body>


</html>
<?php 
include "koneksi.php";
 ?>

<?php
    if (isset($_POST["login"])){
    //variabel untuk menyimpan kiriman dari form
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    if($user=='' || $pass==''){
        echo "Form belum lengkap!!";
    }else{
        $query = mysqli_query($koneksi, "SELECT * FROM tb_guru WHERE username='$user' AND password='$pass'");
        $valid = $query->num_rows;


    if($valid==1)
    {
        //anda login
        $akun = $query->fetch_array();
            $_SESSION['guru'] = $akun['id_guru'];
            
            echo "<script>location='index.php';alert('Login Berhasil')</script>";
        }else{
            echo " <script> alert('Username dan Password anda Salah!!!') </script>";
        }
    }
}
?>