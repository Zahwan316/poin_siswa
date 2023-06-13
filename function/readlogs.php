<?php
require "config.php";

$sql = "SELECT * FROM logs ORDER BY date DESC";

$result = mysqli_query($conn, $sql);


?>