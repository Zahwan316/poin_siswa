<?php

require "config.php";

$id = $_GET["id_history"];
$c_siswa = $_GET["c_siswa"];



//update poin siswa
$result1 = mysqli_query($conn,"SELECT * FROM history WHERE id_history='$id'");
$query = mysqli_fetch_assoc($result1);
$poinsiswa = $query["poin"];
$sql2 = "UPDATE siswa SET poin=poin-$poinsiswa WHERE c_siswa='$c_siswa'";
mysqli_query($conn, $sql2);


//update pelanggaran siswa
mysqli_query($conn, "UPDATE siswa SET pelanggaran=pelanggaran-1 WHERE c_siswa='$c_siswa'");

//hapus data poin di kelas
$result3 = mysqli_query($conn, "SELECT * FROM siswa WHERE c_siswa='$c_siswa'");
$query3 = mysqli_fetch_assoc($result3);
$c_kelas = $query3["c_kelas"];


$result2 = mysqli_query($conn, "SELECT * FROM history WHERE id_history='$id'");
$query2 = mysqli_fetch_assoc($result2);
$poinkelas = $query2["poin"];
$sql3 = "UPDATE kelas SET poin=poin-$poinkelas WHERE c_kelas='$c_kelas'";
mysqli_query($conn, $sql3);

//hapus data pelanggaran di kelas
mysqli_query($conn, "UPDATE kelas SET pelanggaran=pelanggaran-1 WHERE c_kelas='$c_kelas'"); 

//insert log
$nama_history = $query["bentuk_pelanggaran"];
$nama_siswa = $query3["nama"];
$curdate = date("Y-m-d H:i:s");
$c_logs = rand(40000, 80000);
mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','History <b>$nama_history</b> pada murid <b>$nama_siswa</b> berhasil dihapus','$curdate')");


//execute delete
mysqli_query($conn, "DELETE FROM history WHERE id_history='$id'");

//to history page
header("location:../view/history.php");


?>