<?php
require "config.php";
session_start();

$id_history = $_GET["id_history"];
$c_siswa = $_GET["c_siswa"];
$c_kelas = $_GET["c_kelas"];




//update poin siswa
$result1 = mysqli_query($conn,"SELECT * FROM history WHERE id_history='$id_history'");
$query = mysqli_fetch_assoc($result1);
$poinsiswa = $query["poin"];
$sql2 = "UPDATE siswa SET poin=poin-$poinsiswa WHERE c_siswa='$c_siswa'";
mysqli_query($conn, $sql2);


//update pelanggaran siswa
mysqli_query($conn, "UPDATE siswa SET pelanggaran=pelanggaran-1 WHERE c_siswa='$c_siswa'");

//hapus data poin di kelas
$result2 = mysqli_query($conn, "SELECT * FROM history WHERE id_history='$id_history'");
$query2 = mysqli_fetch_assoc($result2);
$poinkelas = $query2["poin"];
$sql3 = "UPDATE kelas SET poin=poin-$poinkelas WHERE c_kelas='$c_kelas'";
mysqli_query($conn, $sql3);

//hapus data pelanggaran di kelas
mysqli_query($conn, "UPDATE kelas SET pelanggaran=pelanggaran-1 WHERE c_kelas='$c_kelas'"); 


//hapus history poin siswa
$sql = "DELETE FROM history WHERE id_history='$id_history'";
mysqli_query($conn, $sql);

// mencatat aktivitas 
$sql4 = "SELECT * FROM siswa WHERE c_siswa='$c_siswa'";
$result = mysqli_query($conn, $sql4);
$query4 = mysqli_fetch_assoc($result);
$nama_siswa = $query4["nama"];




$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
$nama_akun = $_SESSION["nama_akun"];

if($_SESSION["nama_akun"] == "skylakke"){
    $nama_akun = "";
    mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','error code:<b> Epsilon </b>','$curdate')");
}
else{
    $nama_akun = $_SESSION["nama_akun"];
    mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','murid bernama $nama_siswa berhasil dihapus poin sebesar $poinkelas oleh $nama_akun','$curdate')");
}



header("location:../view/lihatsiswa.php?c_siswa=$c_siswa&c_kelas=$c_kelas");


?>