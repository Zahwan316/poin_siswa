<?php
$c_kelas = $_GET["c_kelas"];

$sql = "SELECT * FROM siswa WHERE c_kelas='$c_kelas' ORDER BY nama ASC";
$result = mysqli_query($conn, $sql);

$count = "SELECT * FROM siswa WHERE c_kelas='$c_kelas' ";
$result2 = mysqli_query($conn, $count);

?>