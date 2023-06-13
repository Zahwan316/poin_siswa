<?php
require "../function/config.php";
require "../function/readguru.php";

require "../function/cek_user.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoinSiswa | User</title>
    <link rel="shortcut icon" href="../asset/logo_smkn1banjar.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/kelas.css">
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

    <main>
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
                    <a href='guru.php' class='item-sidebar sidebar-active'>
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
                <div class="title-box">
                    <h2>Seluruh Akun</h2>
                    <a href="addguru.php">
                        <button class="button-add">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Akun
                        </button>
                    </a>
                </div>
                
                <div class="main-table">
                    <table id="" class="table table-striped tablepagination" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $i;
                                $i++; ?></td>
                                <td><?php echo $row["nama"];  ?></td>
                                <td><?php echo $row["username"];  ?></td>
                                <td><?php echo $row["password"];  ?></td>
                                <td class='dprow'>
                                    <a href="edituser.php?c_user=<?= $row['id_user']; ?>">
                                        <button class="btn-edit">
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </button>
                                    </a>
                                    <a href="../function/deleteguru.php?id_user=<?php echo $row["id_user"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')" >
                                        <button class="btn-trash">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>  
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- main content -->

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
        } );
    </script>
</body>

</html>