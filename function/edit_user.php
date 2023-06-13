<?php

require "config.php";
session_start();

$input_nama = htmlspecialchars($_POST["input_nama"]);
$input_username = htmlspecialchars($_POST["input_username"]);
$input_password = htmlspecialchars($_POST["input_password"]);
$c_user = $_GET["c_user"];

$sql = "UPDATE user SET nama='$input_nama',username='$input_username',password='$input_password' WHERE id_user='$c_user'";
mysqli_query($conn,$sql);

//insert logs
$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
$nama_akun = $_SESSION["nama_akun"];
mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','User bernama $input_nama berhasil diedit oleh $nama_akun','$curdate')");

header("location:../view/guru.php");


?>