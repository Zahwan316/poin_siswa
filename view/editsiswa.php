<?php
require "../function/config.php";
require '../function/readdatasiswa.php';

require "../function/cek_user.php";

$c_siswa = $_GET['c_siswa'];
$c_kelas = $_GET['c_kelas'];

/* if(isset($_POST['btn-change'])){
    $input_nama = htmlspecialchars($_POST['input_nama']);
    $input_date = htmlspecialchars($_POST['input_date']);
    $input_tempat = htmlspecialchars($_POST['input_tempat']);
    $input_jk = htmlspecialchars($_POST['jk_button']);
    $input_poin = htmlspecialchars($_POST['input_poin']);

    $sql = "UPDATE siswa SET nama='$input_nama',tanggal_lahir='$input_date',alamat_lahir='$input_tempat',jenis_kelamin='$input_jk',poin='$input_poin' WHERE c_siswa='$c_siswa'";
    mysqli_query($conn, $sql);

    //insert Logs
    $curdate = date("Y-m-d H:i:s");
    $c_logs = rand(40000, 80000);
    mysqli_query($conn, "INSERT INTO logs VALUES('$c_logs','Siswa bernama $input_nama berhasil diedit','$curdate')");

    header("location:../view/lihatsiswa.php?c_kelas=$c_kelas&c_siswa=$c_siswa");
} */

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoinSiswa | Edit Siswa</title>
    <link rel="shortcut icon" href="../asset/logo_smkn1banjar.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/editsiswa.css">
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

    <main class='editsiswa'>
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
                        <button class='btn-logout'>
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
            <div class="box-container">
                <div class="button-container">
                   <h2>Edit Siswa</h2>

                   <a href="lihatsiswa.php?c_kelas=<?php echo $c_kelas ?>&c_siswa=<?php echo $c_siswa ?>">
                    <button class='button-exit'>
                        <i class="fa-solid fa-xmark"></i>
                        <p class='android-dpnone'>
                            Batalkan

                        </p>
                    </button>
                   </a>
                </div>
                <div class="top-wrapper">
                   
                    <div class="info-wrapper">
                        <?php while ($d = mysqli_fetch_assoc($result)) { ?>
                        <form action="../function/editsiswafunc.php?c_kelas=<?=$c_kelas?>&c_siswa=<?=$c_siswa?>" method="post">
                            <ul>
                                <li>
                                    <h2>NISN</h2>
                                    <input type="text" name="input_nama" id="" value='<?php echo $d['nisn']  ?>'>
                                </li>
                                <li>
                                    <h2>Nama</h2>
                                    <input type="text" name="input_nama" id="" value='<?php echo $d['nama']  ?>'>
                                </li>
                                <li>
                                    <h2>Tanggal Lahir</h2>
                                    <input type="date" name="input_date" id=""  value='<?php echo $d['tanggal_lahir']  ?>'>
                                </li>
                                <li>
                                    <h2>Tempat lahir</h2>
                                    <input type="text" name="input_tempat" id=""  value='<?php echo $d['alamat_lahir']  ?>'>
                                </li>
                                <li class='input-radio'>
                                    <h2>Jenis Kelamin</h2>
                                    <div class="radio">
                                        <input type="radio" name="jk_button" value='Laki-Laki' <?php echo ($d["jenis_kelamin"] == "Laki-Laki")?"checked":"" ?> id="">Laki-laki
                                    </div>
                                    <div class="radio">
                                        <input type="radio" name="jk_button" value='Perempuan' <?php echo ($d["jenis_kelamin"] == "Perempuan")?"checked":"" ?> id="">Perempuan
                                    </div>
                                </li>
                                <li>
                                    <h2>Poin</h2>
                                    <input type="text" name="input_poin" id=""  value='<?php echo $d['poin']  ?>'>
                                </li>
                                <li>
                                   <input type="submit" name='btn-change' value="Ubah" class='button-edit'>
                                </li>
                            </ul>
                        </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="bottom-wrapper">
                    <div class="maintable">
                        <h2>Pelanggaran Yang Dilakukan</h2>
                        <table id="tablepagination" class="table table-striped tablepagination" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pelanggaran</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
                                    <tr>                          
                                        <td>1</td>
                                        <td><?php echo $row['bentuk_pelanggaran']; ?></td>
                                        <td><?php echo $row['poin']; ?></td>                              
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- end main content -->
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../js/menu.js"></script>
    <script type="text/javascript" charset="utf-8">
        $.noConflict();
        $(document).ready(function() {
            $('.tablepagination').DataTable();
        });
    </script>
</body>
</html>