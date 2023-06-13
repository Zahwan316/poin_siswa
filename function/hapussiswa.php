<?php
require "config.php";

session_start();

$c_siswa = $_GET["c_siswa"];
$c_kelas = $_GET["c_kelas"];

//hapus poin siswa
$sqlpoin = "SELECT * FROM siswa WHERE c_siswa='$c_siswa'";
$result = mysqli_query($conn, $sqlpoin);
$query = mysqli_fetch_assoc($result);
$poin = $query['poin'];

//hapus pelanggaran siswa
$sqlpelanggaran = "SELECT * FROM siswa WHERE c_siswa='$c_siswa'";
$result2 = mysqli_query($conn, $sqlpelanggaran);
$query2 = mysqli_fetch_assoc($result2);
$pelanggaran = $query2['pelanggaran'];

//read kelas
$result4 = mysqli_query($conn, "SELECT * FROM siswa WHERE c_siswa='$c_siswa'");
$query4 = mysqli_fetch_assoc($result4);
$nama_kelas = $query4["nama_kelas"];

//insert logs
$result3 = mysqli_query($conn, "SELECT * FROM siswa WHERE c_siswa='$c_siswa'");
$query3 = mysqli_fetch_assoc($result3);
$nama_siswa = $query3["nama"];

$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
$nama_akun = $_SESSION["nama_akun"];
mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','Siswa bernama $nama_siswa berhasil dihapus dari kelas $nama_kelas oleh $nama_akun','$curdate')");



mysqli_query($conn, "DELETE FROM siswa WHERE c_siswa='$c_siswa'");
mysqli_query($conn, "UPDATE kelas SET poin=poin-$poin WHERE c_kelas='$c_kelas'");
mysqli_query($conn, "UPDATE kelas SET pelanggaran=pelanggaran-$pelanggaran WHERE c_kelas='$c_kelas'");
mysqli_query($conn, "UPDATE kelas SET siswa=siswa-1 WHERE c_kelas='$c_kelas'");

header("location:../view/siswa.php?c_kelas=$c_kelas");




?>