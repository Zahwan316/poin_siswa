<?php
ob_start();
session_start();
if($_SESSION["user_login"] == false){
    header("location:../index.php");
}

?>