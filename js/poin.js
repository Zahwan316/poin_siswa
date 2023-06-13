let poin_input = document.getElementById("input_poin");
const pelanggaran_input = document.getElementById("pelanggaran_input");

pelanggaran_input.addEventListener("click",() => {
    if(pelanggaran_input.value == "Tidak menggunakan pakaian seragam sekolah sesuai dengan aturan" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Memakai pakaian lain selain pakaian resmi sekolah" ){
        poin_input.value = 8 ;
    }
    else if(pelanggaran_input.value == "Tidak menggunakan atribut yang sudah ditentukan" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Tidak memakai topi sesuai aturan sekolah pada saat upacara bendera, kecuali tim obade" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Tidak menggunakan ikat pinggang sesuai aturan sekolah" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Tidak Memakai kaos kaki sesuai aturan sekolah" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Tidak memakai sepatu sesuai aturan sekolah" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Tidak melaksanakan kebersihan kelas sesuai jadwal" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Kesiangan  kurang dari atau sama dengan 30 menit" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Tiga kali kesiangan dalam satu minggu, ada tambahan poin" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Keluar saat jam pelajaran tanpa seizin guru ybs pada jam tersebut" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Terlambat masuk kelas ketika pergantian jam pelajaran tanpa alasan yang jelas" ){
        poin_input.value = 7 ;
    }
    else if(pelanggaran_input.value == "Tidak mengikuti upacara bendera" ){
        poin_input.value = 8 ;
    }
    else if(pelanggaran_input.value == "Tidak mengikuti kegiatan kerohanian" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Bolos sekolah" ){
        poin_input.value = 10 ;
    }
    else if(pelanggaran_input.value == "Alfa ( tanpa keterangan )" ){
        poin_input.value = 9 ;
    }
    else if(pelanggaran_input.value == "Izin lebih dari tiga hari berturut-turut tanpa keterangan lebih lanjut" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Sakit lebih dari tiga hari tanpa keterangan dokter atau konfirmasi dari orang tua/wali" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Mengganggu ketenangan belajar" ){
        poin_input.value = 6 ;
    }
    else if(pelanggaran_input.value == "Makan, minum, bersolek ketika KBM berlangsung" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Memarkir sepeda motor di sekolah pada saat Kegiatan Belajar Mengajar" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Memasuki dan menggunakan WC guru" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Menggunakan aksesoris berlebihan kecuali jam tangan dan pin yang telah ditentukan sekolah" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Menggunakan kosmetik berlebihan" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Mengoperasikan handphone bukan untuk keperluan belajar, saat kegiatan Belajar Mengajar Handphone harus dalam keadaan off" ){
        poin_input.value = 10 ;
    }
    else if(pelanggaran_input.value == "Rambut laki-laki  menyentuh kerah atau telinga dan memperlihatkan model rambut berlebihan" ){
        poin_input.value = 4 ;
    }
    else if(pelanggaran_input.value == "Membawa  dan memainkan alat musik  ke dalam kelas di luar jam pelajaran tertentu" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Laki-laki menggunakan perhiasan ( selain jam tangan" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Meninggalkan solat jumat berjamaah di mesjid sekolah" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Kuku panjang atau dicat (kutek)" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Telinga ditindik bagi laki-laki" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Masuk kesiangan tidak melalui jalur atau jalan resmi" ){
        poin_input.value = 10 ;
    }
    else if(pelanggaran_input.value == "Pulang belum waktunya melalui jalan tidak resmi" ){
        poin_input.value = 10 ;
    }
    else if(pelanggaran_input.value == "Membawa senjata tajam atau senjata api yang tidak diperlukan dalam KBM" ){
        poin_input.value = 50 ;
    }
    else if(pelanggaran_input.value == "Berperilaku dan ucapan kotor terhadap teman" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Berkelahi di lingkungan sekolah" ){
        poin_input.value = 20 ;
    }
    else if(pelanggaran_input.value == "Melakukan tindakan kriminalitas di lingkungan sekolah dan di luar sekolah" ){
        poin_input.value = 50 ;
    }
    else if(pelanggaran_input.value == "Mencorat coret dinding bangunan sekolah" ){
        poin_input.value = 10 ;
    }
    else if(pelanggaran_input.value == "Membawa rokok atau merokok di sekolah" ){
        poin_input.value = 20 ;
    }
    else if(pelanggaran_input.value == "Meruksak atau menghilangkan barang milik sekolah" ){
        poin_input.value = 50 ;
    }
    else if(pelanggaran_input.value == "Membawa barang terlarang Miras/Narkoba" ){
        poin_input.value = 200;
    }
    else if(pelanggaran_input.value == "Mengkonsumsi obat-obatan terlarang dan minuman keras" ){
        poin_input.value = 200 ;
    }
    else if(pelanggaran_input.value == "Mencukur bulu halis" ){
        poin_input.value = 3 ;
    }
    else if(pelanggaran_input.value == "Perempuan ditindik lebih dari satu" ){
        poin_input.value = 5 ;
    }
    else if(pelanggaran_input.value == "Bertato" ){
        poin_input.value = 30 ;
    }
    else if(pelanggaran_input.value == "Membawa gambar porno dalam media apapun" ){
        poin_input.value = 20 ;
    }
    else if(pelanggaran_input.value == "Melakukan perbuatan yang mengarah pada seks bebas" ){
        poin_input.value = 100 ;
    }
    else if(pelanggaran_input.value == "Membawa alat-alat kontrasepsi" ){
        poin_input.value = 20 ;
    }
    else if(pelanggaran_input.value == "Berperilaku dan mengucapkan ucapan kotor terhadap tenaga pendidik" ){
        poin_input.value = 50 ;
    }
    else if(pelanggaran_input.value == "Membuat kekerasan terhadap tenaga pendidik" ){
        poin_input.value = 100 ;
    }
    else if(pelanggaran_input.value == "Meruksak ,mencorat-coret dan mengganti nilai raport" ){
        poin_input.value = 100 ;
    }
    else if(pelanggaran_input.value == "Hamil" ){
        poin_input.value = 200 ;
    }
    else if(pelanggaran_input.value == "Menghamili" ){
        poin_input.value = 200 ;
    }
    else if(pelanggaran_input.value == "Menikah" ){
        poin_input.value = 200 ;
    }
    
})