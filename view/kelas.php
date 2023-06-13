<?php
require "../function/config.php";
require "../function/readkelas.php";

require "../function/cek_user.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoinSiswa | Kelas</title>
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

    <main class='kelas-tab'>
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
                    <a href="kelas.php" class="item-sidebar sidebar-active">
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
                    <h2>Seluruh Kelas</h2>
                    <button class="button-add" id="btn-add-class">
                        <i class="fa-solid fa-plus"></i>
                        <p>
                            Tambah Kelas
                        </p>
                    </button>
                </div>
                <div class="main-table">
                    <table id="tablepagination" class="table table-striped tablepagination" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Siswa</th>
                                <th class="android-dpnone">Pelanggaran</th>
                                <th>Poin</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;            
                            while ($row = mysqli_fetch_assoc($result)) { 
                            ?>
                                <tr>
                                    <td><?php echo $i;$i++ ?></td>
                                    <td><?php echo $row["nama_kelas"]; ?></td>
                                    <td><?php echo $row["siswa"]; ?></td>
                                    <td class='android-dpnone'><?php echo $row["pelanggaran"]; ?></td>
                                    <td><?php echo $row["poin"]; ?></td>
                                    <td class="flex-row btn-table">
                                        <div class="pc-version">
                                            <a href="siswa.php?c_kelas=<?php echo $row["c_kelas"]; ?>">
                                                <button class="btn-view">
                                                    <i class="fa fa-eye"></i>
                                                    Lihat Siswa
                                                </button>
                                            </a>
                                            <a href="editkelas.php?c_kelas=<?php echo $row["c_kelas"]  ?>">
                                                <button class="btn-edit">
                                                    <i class="fa fa-pencil"></i>
                                                    Edit
                                                </button>
                                            </a>
                                            <a href="../function/deletekelas.php?c_kelas=<?php echo $row["c_kelas"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus kelas ini?')">
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
                                                <a href="siswa.php?c_kelas=<?php echo $row["c_kelas"]; ?>">
                                                    <button class="btn-view">
                                                        <i class="fa fa-eye"></i>
                                                        
                                                    </button>
                                                </a>
                                                <a href="editkelas.php?c_kelas=<?php echo $row["c_kelas"]  ?>">
                                                    <button class="btn-edit">
                                                        <i class="fa fa-pencil"></i>
                                                        
                                                    </button>
                                                </a>
                                                <a href="../function/deletekelas.php?c_kelas=<?php echo $row["c_kelas"] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus kelas ini?')">
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

                <!-- alert notification -->
                <div class="delete-alert">

                </div>
            </div>
        </div>
        <div class="backgroundclass-container" id="background-add-class">
           <div class="notif-delete">
                <div class="title-delete">
                    <h2>Delete siswa</h2>
                </div>
                <div class="main-content-delete">
                    <div class="text-delete-content">
                        <p>Apakah anda yakin ingin menghapus murid ini?</p>
                    </div>
                    <div class="button-delete-container">
                        <a href="">
                            <button>
                                Hapus
                            </button>
                        </a>
                        <a href="">
                            <button>
                                batal
                            </button>
                        </a>
                    </div>
                </div>
           </div>


            <div class="addclass-container">
                <div class="title-class">
                    <p>Tambah Kelas</p>
                </div>

                <div class="main-content-class">
                    <div class="input-class-container">
                        <h2>KELAS</h2>
                <form action="../function/tambahkelas.php" method="POST" '>
                        <input type="text" name="kelas_input" id="">
                    </div>
                    <div class="button-container" >
                            <a href="" class="btn-save" id="btn-save">
                                <input type="submit" value="Simpan" class=' main-btn-save'>
                            </a>
                </form>
                        <button class="btn-cancel" id="btn-cancel">
                            Batal
                        </button>
                    </div>
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
    <script src="../js/listmenu.js"></script>

    <script type="text/javascript" charset="utf-8">
        $.noConflict();
        $(document).ready(function() {
            $('.tablepagination').DataTable();
        });
    </script>
    <script src="../js/kelas.js"></script>
</body>

</html>