<?php
require "config.php";

mysqli_query($conn, "DELETE FROM logs");

//to history page
header("location:../view/logs.php");

?>