const button_list = document.querySelectorAll(".list-action");
const listboxandroid = document.querySelectorAll(".listbox-android");

let btn_click = true;

button_list.forEach((item) => {
    item.addEventListener("click",() => {
        if(btn_click){
            listboxandroid.forEach(el => {
                el.classList.add("android-dpflex");
                el.classList.remove("android-dpnone")
            });
            btn_click = false;
        }
        else{
            listboxandroid.forEach(el => {
                el.classList.add("android-dpnone");
                el.classList.remove("android-dpflex")
            });
            btn_click = true;
        }
    })
})
