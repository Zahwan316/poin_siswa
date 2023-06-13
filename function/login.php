<?php
require "config.php";

session_start();
$_SESSION["user_login"] = false;

if($_SESSION["user_login"] == false){
    header("location:../index.php");
}

$username = htmlspecialchars($_POST["input_name"]);
$password = htmlspecialchars($_POST["input_password"]);

//jika tombol submit ditekan
if(isset($_POST["input_submit"])){
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $query = mysqli_fetch_assoc($result);
    $name = $query["username"];
    $akun_nama = $query["nama"];
    $code = $query["id_user"];
    $password_data = $query['password'];


    $_SESSION["nama_akun"] = $akun_nama;
    $_SESSION["user_login"] = true;


    //jika input username dan password tidak kosong
    if(!empty($username) && !empty($password)){
        //jika input nama dan password sama dengan di database
        if($name == $username && $password == $password_data ){
            //ini buat mencatat aktivitas login
            $curdate = date("Y-m-d H:i:s");
            $c_logs = rand(40000, 80000);
            $nama_akun = $_SESSION["nama_akun"];
            mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','$nama_akun berhasil login','$curdate')");

            //masuk ke halaman dashboard
            header("location:../view/dashboard.php");
        }
        else{
            echo "<script> 
            alert('Username atau password salah') ;
            document.location.href = '../index.php';
            
            </script>";
        }
        
    }
    else{
        echo "<script> 
        alert('Username atau password kosong') ;
        document.location.href = '../index.php';
        
        </script>";
    }

}


?>