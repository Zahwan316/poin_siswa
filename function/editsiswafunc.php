<?php
require "config.php";

$c_siswa = $_GET['c_siswa'];
$c_kelas = $_GET['c_kelas'];

if(isset($_POST['btn-change'])){
    $input_nama = htmlspecialchars($_POST['input_nama']);
    $input_date = htmlspecialchars($_POST['input_date']);
    $input_tempat = htmlspecialchars($_POST['input_tempat']);
    $input_jk = htmlspecialchars($_POST['jk_button']);
    $input_poin = htmlspecialchars($_POST['input_poin']);

    $sql = "UPDATE siswa SET nama='$input_nama',tanggal_lahir='$input_date',alamat_lahir='$input_tempat',jenis_kelamin='$input_jk',poin='$input_poin' WHERE c_siswa='$c_siswa'";
    mysqli_query($conn, $sql);

    //insert Logs
    $curdate = date("Y-m-d H:i:s");
    $c_logs = rand(40000, 80000);
    mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','Siswa bernama $input_nama berhasil diedit','$curdate')");

    header("location:../view/lihatsiswa.php?c_kelas=$c_kelas&c_siswa=$c_siswa");
}


?>