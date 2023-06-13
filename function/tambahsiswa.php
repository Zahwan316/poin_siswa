<?php
require "../function/config.php";
require "../function/readsiswakelas.php";
require "../function/readsiswa.php";
ob_start();
//tambah siswa
if (isset($_POST['simpansiswa'])) {
    
    $c_kelas = htmlspecialchars($_GET["c_kelas"]);
    $c_siswa = rand(10000, 19999);
    $nisn = htmlspecialchars($_POST["input_nisn"]);
    $nama = htmlspecialchars($_POST["input_nama"]);
    $alamat = htmlspecialchars($_POST["input_alamat"]);
    $tanggal_lahir = htmlspecialchars($_POST['input_tanggal']);
    $jk = htmlspecialchars($_POST['radio_input']);

    $namakelas = "";

    while($d = mysqli_fetch_assoc($result1)){
        if($c_kelas == $d["c_kelas"]){
            $namakelas = $d["nama_kelas"];
        }
    }

    $d = mysqli_num_rows($result) + 1;

    if(empty($nisn)){
        echo "<script>
            alert('Input tidak boleh kosong');
        </script>";
    }
    else{
        mysqli_query($conn, "INSERT INTO siswa VALUES('$c_kelas','$nisn','$nama','0','$alamat','$tanggal_lahir','$jk','$c_siswa','$namakelas','0')");
        mysqli_query($conn, "UPDATE kelas SET Siswa='$d' WHERE c_kelas='$c_kelas'");
        
        $curdate = date("Y-m-d H:i:s");
        $c_logs = rand(40000, 80000);
        $nama_akun = $_SESSION["nama_akun"];
        mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','Siswa bernama $nama berhasil ditambah di kelas $namakelas oleh $nama_akun','$curdate')");

        header("location:../view/siswa.php?c_kelas=" . $c_kelas);
    }

   
}

?>