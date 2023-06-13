<?php
$sql = "SELECT * FROM siswa ORDER BY poin DESC LIMIT 4";
$result = mysqli_query($conn, $sql);

$account = "SELECT * FROM user";
$result1 = mysqli_query($conn, $account);

$kelas = "SELECT * FROM kelas";
$result2 = mysqli_query($conn, $kelas);

$sql2 = "SELECT * FROM siswa";
$result3 = mysqli_query($conn,$sql2)


?>