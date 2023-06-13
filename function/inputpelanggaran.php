<?php

$result = mysqli_query($conn, "SELECT * FROM siswa");

if(isset($_POST["input_cari"])){
    $kelas = $_POST["input_kelas"];
    $nama = $_POST["input_nama"];
    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE nama LIKE '%$nama%' OR nisn='$nama' AND nama_kelas='$kelas'");

}


?>