<?php
require "../function/config.php";
require "../function/readdatadasboard.php";

require "../function/cek_user.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoinSiswa | Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="shortcut icon" href="../asset/logo_smkn1banjar.png" type="image/x-icon">
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
        <div class="logout-container ">
            <button class="phone-menu-button" id="phone-menu-button">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a href="../function/logout.php" class='func-logout dpnone'>
                <button class='btn-logout '>
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </button>
            </a>
        </div>
    </nav>
    <!-- navbar -->

    <main class='dashboard'>
        <!-- sidebar -->
        <div class="sidebar" id='sidebar'>
            <ul>
                <li>
                    <div class="account">
                        <div class="imgcontainer">
                            <img src="../asset/guest1.png" alt="">
                        </div>
                        <div class="text-account">
                            <p> <?php
                           
                            echo $_SESSION["nama_akun"];
                            ?></p>
                        </div> 
                    </div>
                </li>
                <li>    
                    <a href="dashboard.php" class="item-sidebar sidebar-active">
                        <i class="fa-solid fa-table-columns"></i>
                        Dashboard
                    </a> 
                </li>

                <li>
                    <a href="tatatertib.php" class='item-sidebar'>
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
                    <a href="kelas.php" class="item-sidebar">
                        <i class="fa-solid fa-school"></i>
                        Kelas
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
            <div class="title-main">
                <h2>Dashboard</h2>
            </div>
            <div class="top">
                <div class="data-card">
                    <div class="container-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <div class="container-text">
                        <p>Siswa Terdaftar</p>
                        <span><?php
                        $d = mysqli_num_rows($result3);
                        echo $d;
                        ?></span>
                    </div>
                </div>
                <div class="data-card akun">
                    <div class="container-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="container-text">
                        <p>Akun Terdaftar</p>
                        <span>
                        <?php
                            $data = mysqli_num_rows($result1);
                            echo $data;
                        ?>
                        </span>
                    </div>
                </div>
                <div class="data-card kelas">
                    <div class="container-icon">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <div class="container-text">
                        <p>Kelas</p>
                        <span>
                        <?php
                            $data = mysqli_num_rows($result2);
                            echo $data;
                        ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="mid">
                <div class="title-mid">
                    <p>Top 4 Pelanggaran Siswa</p>
                </div>
                <div class="main-content-mid">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="siswa-card">
                        <div class="name-content">
                            <p><?php echo $row['nama']; ?></p>
                            <span><?php echo $row['nama_kelas']; ?></span>
                        </div>
                        <div class="poin-content">
                            <p>Poin Pelanggaran</p>
                            <span><?php echo $row['poin']; ?></span>
                        </div>
                        <div class="button-content">
                            <a href="lihatsiswa.php?c_siswa=<?php echo $row['c_siswa']; ?>&c_kelas=<?php echo $row['c_kelas'] ?>">
                                <button>Lihat Pelanggaran</button>
                            </a>
                        </div>
                    </div>

                    <!-- <div class="siswa-card">
                        <div class="name-content">
                            <p>Lorem Ipsum Dolor Sit amet constectur</p>
                            <span>XI RPL 2</span>
                        </div>
                        <div class="poin-content">
                            <p>Poin Pelanggaran</p>
                            <span>50</span>
                        </div>
                        <div class="button-content">
                            <button>Lihat Pelanggaran</button>
                        </div>
                    </div>

                    <div class="siswa-card">
                        <div class="name-content">
                            <p>Lorem Ipsum Dolor Sit amet constectur</p>
                            <span>XI RPL 2</span>
                        </div>
                        <div class="poin-content">
                            <p>Poin Pelanggaran</p>
                            <span>50</span>
                        </div>
                        <div class="button-content">
                            <button>Lihat Pelanggaran</button>
                        </div>
                    </div>

                    <div class="siswa-card">    
                        <div class="name-content">
                            <p>Lorem Ipsum Dolor Sit amet constectur</p>
                            <span>XI RPL 2</span>
                        </div>
                        <div class="poin-content">
                            <p>Poin Pelanggaran</p>
                            <span>50</span>
                        </div>
                        <div class="button-content">
                            <button>Lihat Pelanggaran</button>
                        </div>
                    </div> -->

                    <?php }?>
                </div>
            </div>
            <div class="bottom">

            </div>
        </div>
        <!-- main content -->

    </main>
    <script src="../js/menu.js"></script>
</body>
</html>