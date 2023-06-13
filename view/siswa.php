<?php
require "../function/config.php";
require "../function/readsiswa.php";
require "../function/emptyckelas.php";
require "../function/readsiswakelas.php";
require "../function/cek_user.php";


$c_kelas = htmlspecialchars($_GET["c_kelas"]);
/* //tambah siswa
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

   
} */


$kelas = $_GET["c_kelas"];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoinSiswa | Siswa</title>
    <link rel="shortcut icon" href="../asset/logo_smkn1banjar.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/kelas.css">
    <link rel="stylesheet" href="../css/siswa.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- CSS only -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <!-- navbar -->
    <nav>
        <div class="logo">
            <div class="logo-img-container">
                <img src="../asset/logo_smkn1banjar.png" alt="">
            </div>
            <div class="text-logo">
                <h2>PoinSiswa</h2>
            </div>
        </div>
        <div class="logout-container">
            <button class="phone-menu-button" id="phone-menu-button">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a href="../function/logout.php" class='func-logout'>
                <button class='btn-logout dpnone'>
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </button>
            </a>
        </div>
    </nav>
    <!-- navbar -->

    <main class="siswa-tab">
        <!-- sidebar -->
        <div class="sidebar" id='sidebar'>
            <ul>
                <li>
                    <div class="account">
                        <div class="imgcontainer">
                            <img src="../asset/guest1.png" alt="">
                        </div>
                        <p> <?php                    
                                 echo $_SESSION["nama_akun"];
                                ?></p>
                    </div>
                </li>
                <li>
                    <a href="dashboard.php" class="item-sidebar">
                        <i class="fa-solid fa-table-columns"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="tatatertib.php" class='item-sidebar '>
                        <i class="fa-solid fa-list"></i>
                        Tata Tertib
                    </a>
                </li>
                <li>
                    <a href="pelanggaran.php" class="item-sidebar">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        Input Pelanggaran
                    </a>
                </li>
                
                <?php
                if($_SESSION["nama_akun"] == "admin" || $_SESSION["nama_akun"] == "skylakke"){
                    echo " <li>                  
                    <a href='guru.php' class='item-sidebar'>
                        <i class='fa-solid fa-user'></i>
                        Akun
                    </a> 
                </li>";
                }
                ?>
                <li>
                    <a href="kelas.php" class="item-sidebar ">
                        <i class="fa-solid fa-school"></i>
                        Kelas
                    </a>
                </li>
                <li>
                    <span class='line-child'>|</span>
                    <a href="siswa.php" class="item-sidebar sidebar-active class-child">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Siswa
                    </a>
                </li>
                <li>
                    <a href="history.php" class="item-sidebar">
                        <i class="fa-solid fa-calendar-days"></i>
                        History
                    </a>
                </li>
                <?php
                if($_SESSION["nama_akun"] == "admin" || $_SESSION["nama_akun"] == "skylakke"){
                    echo " <li>
                    <a href='logs.php' class='item-sidebar '>
                        <i class='fa-solid fa-file-pen'></i>
                        Logs
                    </a>
                </li>";
                }
                ?>
                <li>
                    <a href="../function/logout.php" class='func-logout'>
                        <button class='btn-logout '>
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </button>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar -->

        <!-- main content -->
        <div class="main-content">
            <div class="box-container" id="box-container1">
                <div class="title-box">
                    <h2>Siswa Kelas
                        <?php while ($data = mysqli_fetch_assoc($result1)) {  ?>
                            <?php if ($kelas == $data["c_kelas"]) {
                                echo $data["nama_kelas"];
                            } ?>
                        <?php }  ?>
                    </h2>
                    <button class="button-add" id="button-tambah-siswa">
                        <i class="fa-solid fa-plus"></i>
                        <p class='android-dpnone'>
                            Tambah Siswa

                        </p>
                    </button>
                </div>

                <div class="main-table">
                    <table id="tablepagination" class="table table-striped tablepagination" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class='dp-none-android'>NISN</th>
                                <th>Nama</th>
                                <th class='dp-none-android'>Pelanggaran</th>
                                <th>Poin</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    
                                    <td><?php
                                        echo $i;
                                        $i++;
                                    ?></td>
        
                                    <td class='dp-none-android'><?php echo $row["nisn"]; ?></td>
                                    <td><?php echo $row["nama"]; ?></td>
                                    <td class='dp-none-android'><?php echo $row["pelanggaran"]; ?></td>
                                    <td>
                                        <?php echo $row["poin"]; ?>
                                        <?php echo '<i id="alertbutton" class="fa-solid fa-triangle-exclamation alertbutton" style="color:red;'.($row['poin'] >= 200?'display:inline-block':'display:none').'"></i>'; ?> 
                                    </td>
                                    <td class='row-button'>
                                        <div class="pc-version">
                                            <a href="../view/lihatsiswa.php?c_siswa=<?php echo $row["c_siswa"]; ?>&c_kelas=<?php echo $row["c_kelas"]; ?> " class='btn-view-siswa'>
                                                <button class="btn-trash">
                                                    <i class="fa-solid fa-eye"></i>
                                                    
                                                        Lihat Siswa

                                                    
                                                </button>
                                            </a>
                                            <a href="../function/hapussiswa.php?c_siswa=<?php echo $row["c_siswa"]; ?>&c_kelas=<?php echo $row["c_kelas"]; ?> " onclick="return confirm('Apakah anda yakin ingin menghapus murid ini?')">
                                                <button class="btn-trash">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </div> 
                                        <div class="android-version">
                                            <button class='list-action'>
                                                 <i class="fa-solid fa-list"></i>
                                            </button>

                                            <div class="listbox-android">
                                                <a href="../view/lihatsiswa.php?c_siswa=<?php echo $row["c_siswa"]; ?>&c_kelas=<?php echo $row["c_kelas"]; ?> " class='btn-view-siswa'>
                                                    <button class="btn-trash">
                                                        <i class="fa-solid fa-eye"></i>
                                                       
                                                    </button>
                                                </a>
                                                <a href="../function/hapussiswa.php?c_siswa=<?php echo $row["c_siswa"]; ?>&c_kelas=<?php echo $row["c_kelas"]; ?> " onclick="return confirm('Apakah anda yakin ingin menghapus murid ini?')">
                                                    <button class="btn-trash">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </a>
                                            </div>
                                       
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Container Tambah Siswa -->
            <div class="box-container" id="box-container2">
                <!-- judul -->
                <div class="title-box">
                    <h2>Tambah Siswa </h2>
                    <button class="button-add" id="button-lihat-siswa">
                        <i class="fa-solid fa-list"></i>
                        <p class='android-dpnone'>
                            Lihat Siswa
                        </p>
                    </button>
                </div>
                <!-- end judul -->
                <!-- notif siswa -->
                <div class="notif-box">
                    <i class="fa-solid fa-check"></i>
                    <p>Siswa Berhasil Ditambahkan</p>
                </div>
                <!-- end notif siswa -->

                <!-- Tambah Siswa -->
                <div class="container-siswa">
                    
                    <form action="../function/tambahsiswa.php?c_kelas=<?= $c_kelas; ?>" method="POST">
                        <ul>
                            <li>
                                <label for="">NISN</label>
                                <input type="number" name="input_nisn" id="">
                            </li>
                            <li>
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="input_nama" id="">

                            </li>
                            <li class="flex-row">
                                <div class="flex-column input-address-main">
                                    <label for="">Alamat Lahir</label>
                                    <input type="text" name="input_alamat" id="">
                                </div>
                                <div class="flex-column input-address-main">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" style="width: 100%;height:5vh" name="input_tanggal" id="">
                                </div>
                            </li>
                            <li class="flex-column">
                                <label for="">Jenis Kelamin</label>
                                <div class="radioinput">
                                    <input type="radio" name="radio_input" value="Laki-Laki" id="">
                                    <p>Laki-Laki</p>
                                </div>
                                <div class="radioinput">
                                    <input type="radio" name="radio_input" value="Perempuan" id="">
                                    <p>Perempuan</p>
                                </div>
                            </li>
                            <li>
                                <input type="submit" value="Simpan Siswa" name="simpansiswa" class="btn-submit">
                            </li>
                        </ul>
                    </form>
                </div>

                <!-- End Tambah Siswa -->

            </div>
            <!-- end container Tambah Siswa -->
        </div>


        <!-- notif -->




        <!-- main content -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../js/siswa.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/listmenu.js"></script>
    <script>    
        const alertbutton = document.getElementById("alertbutton")

        
    </script>

    <script type="text/javascript" charset="utf-8">
        $.noConflict();
        $(document).ready(function() {
            $('.tablepagination').DataTable();
        });
    </script>
</body>

</html>