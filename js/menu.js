const phone_menu_button = document.getElementById("phone-menu-button");
const sidebar = document.getElementById("sidebar");
let toggle = true;

phone_menu_button.addEventListener("click",() => {
    if(toggle){
        sidebar.style.display = "flex";
        sidebar.classList.add("sidebaranm");
        sidebar.classList.remove("closesidebaranm");
        sidebar.style.transition = "all 1s";
        toggle = false;
    }
    else{
        sidebar.style.display = "none";
        sidebar.classList.add("closesidebaranm");
        sidebar.classList.remove("sidebaranm");
        toggle = true;
    }
})