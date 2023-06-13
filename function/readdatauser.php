<?php

$c_user = $_GET["c_user"];

$resultuser = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$c_user'");

?>