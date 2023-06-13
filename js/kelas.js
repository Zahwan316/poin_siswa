const btn_add = document.getElementById("btn-add-class");
const btn_cancel = document.getElementById("btn-cancel");
const btn_save = document.getElementById("btn-save");
const background_add_class = document.getElementById("background-add-class")

btn_add.addEventListener("click",() => {
    background_add_class.style.display = "flex";
})

const display_none = () => {
    background_add_class.style.display = "none"
}

btn_cancel.addEventListener("click",display_none)
//btn_save.addEventListener("click",display_none)

/* edit kelas */

