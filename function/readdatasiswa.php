<?php
require("config.php");
//read database siswa
$c_siswa = $_GET['c_siswa'];
$c_kelas = $_GET['c_kelas'];

$sql = "SELECT * FROM siswa WHERE c_siswa='$c_siswa'";
$result = mysqli_query($conn, $sql);



//read database history

$sqlhistory = "SELECT * FROM history WHERE c_siswa='$c_siswa'";
$result2 = mysqli_query($conn, $sqlhistory);



?>