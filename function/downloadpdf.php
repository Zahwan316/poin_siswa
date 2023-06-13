<?php
require('laporan.php');
require('readdatasiswa.php');
require("config.php");

$data_siswa = mysqli_fetch_assoc($result);
$pelanggaran_siswa = mysqli_fetch_assoc($result2);

// Buat instance dari class LaporanPDF
$pdf = new LaporanPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$heeader = ['pelangggaran','poin'];

// Buat data yang akan ditampilkan di laporan
$data = array(
    array(
    'nama' => $data_siswa['nama'],
    'nisn' => $data_siswa['nisn'],
    'jenis_kelamin' => $data_siswa['jenis_kelamin'],
    'alamat_lahir' => $data_siswa["alamat_lahir"],
    'tanggal_lahir' => $data_siswa['tanggal_lahir'],
    'poin' => $data_siswa['poin'],
    'pelanggaran' => $pelanggaran_siswa['bentuk_pelanggaran'],
    'poin_pelanggaran' => $pelanggaran_siswa['poin']
),

);
// Tambahkan isi laporan dengan memanggil fungsi IsiLaporan
$pdf->IsiLaporan($data);

// Output laporan dalam format PDF
$pdf->Output();
?>