<?php

$c_siswa = $_GET['c_siswa'];

$sql = "SELECT * FROM siswa WHERE c_siswa='$c_siswa' ";
$result = mysqli_query($conn,$sql);

?>