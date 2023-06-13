<?php

require "config.php";
session_start();
$id = $_GET["id_user"];


//get user data
$result = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
$query = mysqli_fetch_assoc($result);
$user_name = $query["nama"];

//insert logs
$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
$nama_akun = $_SESSION["nama_akun"];
mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','User bernama $user_name berhasil dihapus oleh $nama_akun','$curdate')");


mysqli_query($conn, "DELETE FROM user WHERE id_user='$id'");
header("location:../view/guru.php");
?>