<?php
require "../function/config.php";
if(isset($_POST["input_submit"])){
    session_start();

    $poin_input = $_POST["poin_input"];
    $pelanggaran_input = $_POST["pelanggaran_input"];
    $tanggal_input = $_POST["tanggal_input"];
    $c_siswa = $_GET["c_siswa"];
    $c_kelas = $_GET['c_kelas'];
    $id_history = rand(20000, 30000);

    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE c_siswa='$c_siswa'");


    $nama_siswa = '';
    while($d = mysqli_fetch_assoc($result)){
        if($c_siswa == $d['c_siswa']){
            $nama_siswa = $d['nama'];
        }
    }


    $sql = "UPDATE siswa SET poin=poin+$poin_input WHERE c_siswa='$c_siswa'";
    $sql2 = "INSERT INTO history VALUES('$nama_siswa','$pelanggaran_input','$poin_input','$tanggal_input','$id_history','$c_siswa') ";
    $sql3 = "UPDATE kelas SET pelanggaran=pelanggaran+1 WHERE c_kelas='$c_kelas'";
    $sql4 = "UPDATE kelas SET poin=poin+$poin_input WHERE c_kelas='$c_kelas'";
    $sql5 = "UPDATE siswa SET pelanggaran=pelanggaran+1 WHERE c_siswa='$c_siswa'";

    //ini buat mencatat aktivitas tambah poin
    $curdate = date("Y-m-d H:i:s");
    $c_logs = rand(40000, 80000);
    $nama_akun = $_SESSION["nama_akun"];
    mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','murid bernama $nama_siswa berhasil ditambahkan poin sebesar $poin_input oleh $nama_akun','$curdate')");


    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    mysqli_query($conn, $sql4);
    mysqli_query($conn, $sql5);

    header("location:../view/history.php");
}



?>