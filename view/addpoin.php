<?php
require "../function/config.php";
require "../function/readpoin.php";

$c_siswa = $_GET['c_siswa'];
$c_kelas = $_GET['c_kelas'];

require "../function/config.php";
require "../function/cek_user.php";
//jika tombol submit ditekan
/* if(isset($_POST["input_submit"])){
    
    $poin_input = $_POST["poin_input"];
    $pelanggaran_input = $_POST["pelanggaran_input"];
    $tanggal_input = $_POST["tanggal_input"];
    $c_siswa = $_GET["c_siswa"];
    $c_kelas = $_GET['c_kelas'];
    $id_history = rand(20000, 30000);

    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE c_siswa='$c_siswa'");


    $nama_siswa = '';
    while($d = mysqli_fetch_assoc($result)){
        if($c_siswa == $d['c_siswa']){
            $nama_siswa = $d['nama'];
        }
    }


    $sql = "UPDATE siswa SET poin=poin+$poin_input WHERE c_siswa='$c_siswa'";
    $sql2 = "INSERT INTO history VALUES('$nama_siswa','$pelanggaran_input','$poin_input','$tanggal_input','$id_history','$c_siswa') ";
    $sql3 = "UPDATE kelas SET pelanggaran=pelanggaran+1 WHERE c_kelas='$c_kelas'";
    $sql4 = "UPDATE kelas SET poin=poin+$poin_input WHERE c_kelas='$c_kelas'";
    $sql5 = "UPDATE siswa SET pelanggaran=pelanggaran+1 WHERE c_siswa='$c_siswa'";


    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    mysqli_query($conn, $sql4);
    mysqli_query($conn, $sql5);

    header("location:../view/history.php");
} */


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoinSiswa | Tambah Poin</title>
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/kelas.css">
    <link rel="stylesheet" href="../css/poin.css">
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
                    <a href="tatatertib.php" class='item-sidebar'>
                        <i class="fa-solid fa-list"></i>
                        Tata Tertib
                    </a>
                </li>
                <li>
                    <a href="pelanggaran.php" class="item-sidebar  sidebar-active">
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
                    <h2>Siswa Yang Melanggar</h2>
                </div>
                <div class="main-table">
                    <table id="tablepagination" class="table table-striped tablepagination" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($d = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $d["nisn"] ?></td>
                                <td><?php echo $d["nama"] ?></td>
                                <td>                  
                                    <?php echo $d["nama_kelas"] ?>
                                </td>
                            </tr>  
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box-container">
                <div class="title-box">
                    <p>Pilih Pelanggaran Yang Dilakukan Siswa Tersebut</p>
                    <a href="tatatertib.php">
                            <button class="btn-tatatertib">Lihat Tata Tertib</button>
                        </a>
                </div>
                <form action="../function/tambahpoin.php?c_siswa=<?= $c_siswa?>&c_kelas=<?= $c_kelas?>" method="post">
                <div class="input-container" style="flex-wrap: wrap;">
                    <div class="input-items">
                        <label for="">Pilih Pelanggaran yang dilakukan</label>
                        <!-- <input type="text" list='pelanggaran' id="mainpoin" > -->
                        <select id='pelanggaran_input' name='pelanggaran_input'>
                            <optgroup label="-PELANGGARAN TINGKAT RENDAH">   
                                <optgroup label='A.Keseragaman'>
                                    <option value="Tidak menggunakan pakaian seragam sekolah sesuai dengan aturan">1.Tidak menggunakan pakaian seragam sekolah sesuai dengan aturan</option>
                                    <option value="Memakai pakaian lain selain pakaian resmi sekolah">2.Memakai pakaian lain selain pakaian resmi sekolah</option>
                                    <option value="Tidak menggunakan atribut yang sudah ditentukan">3.Tidak menggunakan atribut yang sudah ditentukan</option>
                                    <option value="Tidak memakai topi sesuai aturan sekolah pada saat upacara bendera, kecuali tim obade">4.Tidak memakai topi sesuai aturan sekolah pada saat upacara bendera, kecuali tim obade</option>
                                    <option value="Tidak menggunakan ikat pinggang sesuai aturan sekolah">5.Tidak menggunakan ikat pinggang sesuai aturan sekolah</option>
                                    <option value="Tidak Memakai kaos kaki sesuai aturan sekolah">6.Tidak Memakai kaos kaki sesuai aturan sekolah</option>
                                    <option value="Tidak memakai sepatu sesuai aturan sekolah">7.Tidak memakai sepatu sesuai aturan sekolah</option>    
                                </optgroup>    
                                <optgroup label="B.Kegiatan Belajar Mengajar">

                                    <option value="Kesiangan  kurang dari atau sama dengan 30 menit">8.Kesiangan  kurang dari atau sama dengan 30 menit</option>
                                    <option value="Tiga kali kesiangan dalam satu minggu, ada tambahan poin">9.Tiga kali kesiangan dalam satu minggu, ada tambahan poin</option>
                                    <option value="Keluar saat jam pelajaran tanpa seizin guru ybs pada jam tersebut">10.Keluar saat jam pelajaran tanpa seizin guru ybs pada jam tersebut</option>
                                    <option value="Terlambat masuk kelas ketika pergantian jam pelajaran tanpa alasan yang jelas">11.Terlambat masuk kelas ketika pergantian jam pelajaran tanpa alasan yang jelas</option>
                                    <option value="Tidak mengikuti upacara bendera">12.Tidak mengikuti upacara bendera</option>
                                    <option value="Tidak mengikuti kegiatan kerohanian">13.Tidak mengikuti kegiatan kerohanian</option>
                                    <option value="Bolos sekolah">14.Bolos sekolah</option>
                                    <option value="Alfa ( tanpa keterangan )">15.Alfa ( tanpa keterangan )</option>
                                    <option value="Izin lebih dari tiga hari berturut-turut tanpa keterangan lebih lanjut">16.Izin lebih dari tiga hari berturut-turut tanpa keterangan lebih lanjut</option>
                                    <option value="Sakit lebih dari tiga hari tanpa keterangan dokter atau konfirmasi dari orang tua/wali">17.Sakit lebih dari tiga hari tanpa keterangan dokter atau konfirmasi dari orang tua/wali</option>
                                    <option value="Mengganggu ketenangan belajar">18.Mengganggu ketenangan belajar</option>
                                    <option value="Makan, minum, bersolek ketika KBM berlangsung">19.Makan, minum, bersolek ketika KBM berlangsung</option>
                                </optgroup>

                                <optgroup label="C.etika Moralitas">

                                    <option value="Memarkir sepeda motor di sekolah pada saat Kegiatan Belajar Mengajar">20.Memarkir sepeda motor di sekolah pada saat Kegiatan Belajar Mengajar</option>
                                    <option value="Memasuki dan menggunakan WC guru">21.Memasuki dan menggunakan WC guru</option>
                                    <option value="Menggunakan aksesoris berlebihan kecuali jam tangan dan pin yang telah ditentukan sekolah">22.Menggunakan aksesoris berlebihan kecuali jam tangan dan pin yang telah ditentukan sekolah</option>
                                    <option value="Menggunakan kosmetik berlebihan">23.Menggunakan kosmetik berlebihan</option>
                                    <option value="Mengoperasikan handphone bukan untuk keperluan belajar, saat kegiatan Belajar Mengajar Handphone harus dalam keadaan off">24.Mengoperasikan handphone  bukan  untuk  keperluan  belajar, saat  kegiatan  Belajar  Mengajar
    Handphone harus dalam keadaan off</option>
                                    <option value="Rambut laki-laki  menyentuh kerah atau telinga dan memperlihatkan model rambut berlebihan">25.Rambut laki-laki  menyentuh kerah atau telinga dan memperlihatkan model rambut berlebihan</option>
                                    <option value="Membawa  dan memainkan alat musik  ke dalam kelas di luar jam pelajaran tertentu">26.Membawa  dan memainkan alat musik  ke dalam kelas di luar jam pelajaran tertentu</option>
                                    <option value="Laki-laki menggunakan perhiasan ( selain jam tangan">27.Laki-laki menggunakan perhiasan ( selain jam tangan</option>
                                    <option value="Meninggalkan solat jumat berjamaah di mesjid sekolah">28.Meninggalkan solat jumat berjamaah di mesjid sekolah</option>
                                    <option value="Kuku panjang atau dicat (kutek)">29.Kuku panjang atau dicat (kutek)</option>
                                    <option value="Telinga ditindik bagi laki-laki">30.Telinga ditindik bagi laki-laki</option>
                                    <option value="Berperilaku dan ucapan kotor terhadap teman">331.Berperilaku dan ucapan kotor terhadap teman</option>
                                    <option value="Mencukur bulu halis">332.Mencukur bulu halis</option>
                                    <option value="Perempuan ditindik lebih dari satu">33.Perempuan ditindik lebih dari satu</option>
                                </optgroup>
                            </optgroup>
                            <optgroup label="-PELANGGARAN TINGKAT SEDANG">
                                <option value="Masuk kesiangan tidak melalui jalur atau jalan resmi">1.Masuk kesiangan tidak melalui jalur atau jalan resmi</option>
                                <option value="Pulang belum waktunya melalui jalan tidak resmi">2.Pulang belum waktunya melalui jalan tidak resmi</option>
                                <option value="Berkelahi di lingkungan sekolah">3.Berkelahi di lingkungan sekolah</option>
                                <option value="Mencorat coret dinding bangunan sekolah">4.Mencorat coret dinding bangunan sekolah</option>
                                <option value="Membawa rokok atau merokok di sekolah">5.Membawa rokok atau merokok di sekolah</option>
                                <option value="Bertato">6.Bertato</option>
                                <option value="Membawa gambar porno dalam media apapun">7.Membawa gambar porno dalam media apapun</option>
                                <option value="Membawa alat-alat kontrasepsi">8.Membawa alat-alat kontrasepsi</option>
                                <option value="Berperilaku dan mengucapkan ucapan kotor terhadap tenaga pendidik">9.Berperilaku dan mengucapkan ucapan kotor terhadap tenaga pendidik</option>
                            </optgroup>
                            <optgroup label="-PELANGGARAN TINGKAT TINGGI">
                                <option value="Membawa senjata tajam atau senjata api yang tidak diperlukan dalam KBM">1.Membawa senjata tajam atau senjata api yang tidak diperlukan dalam KBM</option>
                                <option value="Melakukan tindakan kriminalitas di lingkungan sekolah dan di luar sekolah">2.Melakukan tindakan kriminalitas di lingkungan sekolah dan di luar sekolah</option>
                                <option value="Meruksak atau menghilangkan barang milik sekolah">3.Meruksak atau menghilangkan barang milik sekolah</option>
                                <option value="Membawa barang terlarang Miras/Narkoba">4.Membawa barang terlarang Miras/Narkoba</option>
                                <option value="Mengkonsumsi obat-obatan terlarang dan minuman keras">5.Mengkonsumsi obat-obatan terlarang dan minuman keras</option>
                                <option value="Melakukan perbuatan yang mengarah pada seks bebas">6.Melakukan perbuatan yang mengarah pada seks bebas</option>
                                <option value="Membuat kekerasan terhadap tenaga pendidik">7.Membuat kekerasan terhadap tenaga pendidik</option>
                                <option value="Meruksak ,mencorat-coret dan mengganti nilai raport">8.Meruksak ,mencorat-coret dan mengganti nilai raport</option>
                                <option value="Hamil">9.Hamil</option>
                                <option value="Menghamili">10.Menghamili</option>
                                <option value="Menikah">11.Menikah</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="input-items">
                        <label for="">Poin</label>
                        <input type="number" name="poin_input" id="input_poin">
                    </div>
                    <div class="input-items">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal_input" id="">
                    </div>
                    <div class="input-items3">
                        <input type="submit" name="input_submit" value="Selesai" class="btn-done">
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- main content -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../js/poin.js"></script>
    <script src="../js/menu.js"></script>
    <script type="text/javascript" charset="utf-8">
        $.noConflict();
        $(document).ready(function() {
            $('.tablepagination').DataTable();
        });
    </script>
</body>

</html>