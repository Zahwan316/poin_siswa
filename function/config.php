<?php

/* class koneksi{
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "";
    private $dbname = "poinsiswasmk1";
    public $conn;

    public function konek(){
        $conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if($this->conn){
            echo "koneksi error : ".mysqli_connect_error();
        }
    }

    public function error(){
    }
}

$connect = new koneksi();

$connect->konek();
$connect->error(); */
 
/*  */

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "poinsiswasmk1";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    echo "koneksi error : ".mysqli_connect_error();
}


?>