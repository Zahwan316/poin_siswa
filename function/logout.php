<?php
require "config.php";

session_start();

$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
$nama_akun = $_SESSION["nama_akun"];
mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','$nama_akun berhasil logout','$curdate')");

session_unset();
session_destroy();


header("location:../index.php");


?>