<?php
require "config.php";
ob_start();
session_start();

if(isset($_POST['simpan_btn'])){
    $kelas_input = htmlspecialchars($_POST["kelas_input"]);
    $c_kelas = $_GET["c_kelas"];

    //execute command
    mysqli_query($conn, "UPDATE kelas SET nama_kelas='$kelas_input' WHERE c_kelas='$c_kelas'");
    //back to class page
    
    //insert logs
    $curdate = date("Y-m-d H:i:s");
    $c_logs = rand(40000, 80000);
    $nama_akun = $_SESSION["nama_akun"];
    mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','Kelas bernama $kelas_input berhasil diedit oleh $nama_akun','$curdate')");

    header("location:../view/kelas.php");
}

?>