<?php

$c_kelas = $_GET["c_kelas"];


if(empty($_GET["c_kelas"])){
    echo "<script> 
    alert('Kelas Belum Dipilih') ;
    document.location.href = '../view/kelas.php';
    
    </script>";
    /* header("location:../view/dashboard.php"); */
}

?>