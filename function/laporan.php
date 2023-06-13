<?php
require('fpdf185/fpdf.php');

class LaporanPDF extends FPDF
{
    // Fungsi untuk membuat header
    function Header()
    {
        // Set font
        $this->SetFont('Arial','B',16);
        // Move to the right
        $this->Cell(80);
        // Title
       // $this->Text(60,20,'Laporan Siswa Yang Melanggar');
        $text = "Laporan Siswa Yang Melanggar";
        $x = ($this->GetPageWidth() - $this->GetStringWidth($text)) / 2;
        $this->Text($x,20,$text);
        // Line break
        $this->Ln(20);
    }
    
    // Fungsi untuk membuat footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    // Fungsi untuk membuat isi laporan
    function IsiLaporan($data)
    {
        // Set font
        $this->SetFont('Arial','',12);
        // Loop through data and add to PDF
        foreach($data as $row) {

            //tabel nama
            $this->Cell(40,10,'Nama ',1,0);
            $this->Cell(100,10,$row['nama'],1,0);
            $this->Ln();

            //tabel nisn
            $this->Cell(40,10,'nisn',1,0);
            $this->Cell(100,10,$row['nisn'],1,0);
            $this->Ln();

            //tabel jenis kelamin
            $this->Cell(40,10,'jenis_kelamin',1,0);
            $this->Cell(100,10,$row['jenis_kelamin'],1,0);
            $this->Ln();

            //tabel alamat lahir
            $this->Cell(40,10,'Alamat Lahir',1,0);
            $this->Cell(100,10,$row['alamat_lahir'],1,0);
            $this->Ln();

            //tabel tanggal lahir
            $this->Cell(40,10,'Tanggal Lahir',1,0);
            $this->Cell(100,10,$row['tanggal_lahir'],1,0);
            $this->Ln();

            //tabel poin
            $this->Cell(40,10,'poin',1,0);
            $this->Cell(100,10,$row['poin'],1,0);
            $this->Ln();

            $this->Ln();
            $this->Ln();

            //tabel judul pelanggaran
            $text = 'Pelanggaran Yang Dilakukan';
            $x = ($this->GetPageWidth() - $this->GetStringWidth($text)) / 2;

            $this->SetFont('Arial','B',16);
            $this->Text($x,110,$text);
            $this->Ln();

            $this->SetFont('Arial','',12);
            $this->Cell($this->GetStringWidth($row['pelanggaran']) + 10,10,'Pelanggaran',1,0);
            $this->Cell($this->GetStringWidth($row['poin']) + 10,10,'poin',1,0);
            $this->Ln();
            
            //tabel isi pelanggaran
            
            $this->SetFont('Arial','',10);
            /* 
             foreach($row as $col){
                if(is_array($col)){
                    foreach($col as $val)
                    $this->Cell($this->GetStringWidth($val),10,$val['pelanggaran'],1,0);
                    $this->Cell(20,10,$val,1,0);
                }
                else{
                    $this->Cell($this->GetStringWidth($col),10,$col,1,0);
                }
            } */

           
               
            $this->Cell($this->GetStringWidth($row['pelanggaran']) + 10,10,$row['pelanggaran'],1,0);
            $this->Cell($this->GetStringWidth($row['poin']) + 10,10,$row['poin'],1,0);
            
                    
                   
             $this->Ln();
            

        }
    }

    
}
?>