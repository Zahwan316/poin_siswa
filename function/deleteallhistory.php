<?php
require 'config.php';

mysqli_query($conn, 'DELETE FROM history');
header("location:../view/history.php");

?>