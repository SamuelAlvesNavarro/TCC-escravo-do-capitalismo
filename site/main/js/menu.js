var bodyT = document.querySelector("body");
var menu = document.getElementById("menu");
var all_menu = document.getElementById("all-menu");
var chevron = document.getElementById("chevron-menu");

var n = true;
function switchMenu(){
    if(n){
        menu.classList.toggle("on");
        menu.classList.toggle("off");
        n = false;
    }
    else{
        if(menu.classList.contains("off")){
            menu.classList.toggle("on");
            menu.classList.toggle("off");
            
        }
        n = true;
    }
}
function menu_appear(){
    bodyT.classList.toggle("menuOn");
    all_menu.classList.toggle("disappear");
    menu.classList.remove("on");
    menu.classList.remove("off");
    menu.classList.add("off");
    chevron.classList.toggle("chevron-phases");
}