const box_container1 = document.getElementById("box-container1")
const box_container2 = document.getElementById("box-container2")
const button_tambah_siswa = document.getElementById("button-tambah-siswa")
const button_lihat_siswa = document.getElementById("button-lihat-siswa")

button_tambah_siswa.addEventListener("click",() => {
    box_container1.style.display = "none"
    box_container2.style.display = "flex"
})

button_lihat_siswa.addEventListener("click",() => {
    box_container1.style.display = "flex"
    box_container2.style.display = "none"
})