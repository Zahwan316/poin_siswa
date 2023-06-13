<?php
require "config.php";
session_start();

$kelas_input =htmlspecialchars( $_POST["kelas_input"]);
$c_kelas = rand(1000,4000);

if(empty($kelas_input)){
    header("location:../view/kelas.php"); 
}
else{
    mysqli_query($conn, "INSERT INTO kelas VALUES('$kelas_input',0,0,0,'$c_kelas')");

    //insert logs

    $curdate = date("Y-m-d H:i:s");
    $c_logs = rand(40000, 80000);
    $nama_akun = $_SESSION["nama_akun"];
    mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','Kelas bernama $kelas_input berhasil ditambakan oleh $nama_akun','$curdate')");
    header("location:../view/kelas.php");
}


?>