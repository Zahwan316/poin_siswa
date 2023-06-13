<?php
require "config.php";
session_start();
$nama = htmlspecialchars($_POST["input_nama"]);
$username = htmlspecialchars($_POST["input_username"]);
$password = htmlspecialchars( $_POST["input_password"]);
$role= htmlspecialchars( $_POST["input_role"]);
$id = rand(1000,5000);

mysqli_query($conn, "INSERT INTO user VALUES('$nama','$username','$password','$id','$role')");

header("location:../view/guru.php");

//insert log
$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
$nama_akun = $_SESSION["nama_akun"];
mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','User bernama $nama berhasil ditambah oleh $nama_akun','$curdate')");

?>