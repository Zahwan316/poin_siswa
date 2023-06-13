<?php

require "config.php";
session_start();
$c_kelas = $_GET["c_kelas"];


//insert logs
$result1 = mysqli_query($conn, "SELECT * FROM kelas WHERE c_kelas='$c_kelas'");
$data = mysqli_fetch_assoc($result1);
$nama_kelas =  $data["nama_kelas"];

$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
$nama_akun = $_SESSION["nama_akun"];
mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','Kelas bernama $nama_kelas berhasil dihapus oleh $nama_akun','$curdate')");

mysqli_query($conn, "DELETE FROM kelas WHERE c_kelas='$c_kelas'");
mysqli_query($conn, "DELETE FROM siswa WHERE c_kelas='$c_kelas'");

header("location:../view/kelas.php");

?>