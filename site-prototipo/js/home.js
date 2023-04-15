viewPortHeight = window.innerHeight + "px";

const toggle = document.getElementById("mode");
const root = document.querySelector(":root");
var bt_enter = document.getElementById("bt-enter");
var img_cat = document.getElementById("img-cat-paw");
var main = document.getElementById("main");
var home_background = document.getElementById("home-background");
var acesso = document.getElementById("acess");
var menu = document.getElementById("menu");
var goback = document.getElementById("goback");

var dark = false;
toggle.addEventListener('click', () => {
    root.classList.toggle('dark');

    if(dark){
        toggle.classList.remove('fa-moon');
        toggle.classList.add('fa-sun');
        dark = false;
    }else{
        dark = true;
        toggle.classList.remove('fa-sun');
        toggle.classList.add('fa-moon');
    }
})

// color switch - lil balls

const home = document.getElementById("home-link");
const exp = document.getElementById("exp-link");
const beh = document.getElementById("beh-link");
const wys = document.getElementById("wys-link");
const rank = document.getElementById("rank-link");
const prem = document.getElementById("prem-link");
const last = document.getElementById("last-link");

previous = 1;
numb = 1;

function SwitchColor(numbi){
    
    if(previous != numb && numb != 7)previous = numb;

    numb = numbi;

    if(numbi == 0) numb = previous;


    if(numb != 1){
        home.classList.remove("selected-link");
    }else{
        home.classList.add("selected-link");
        goback.href="#home-section";
    }
    if(numb != 2){
        exp.classList.remove("selected-link");
    }else{
        exp.classList.add("selected-link");
        goback.href="#exp-sec";
    }
    if(numb != 3){
        beh.classList.remove("selected-link");
    }else{
        beh.classList.add("selected-link");
        goback.href="#beh-sec";
    }
    if(numb != 4){
        wys.classList.remove("selected-link");
    }else{
        wys.classList.add("selected-link");
        goback.href="#wys-sec";
    }
    if(numb != 5){
        rank.classList.remove("selected-link");
    }else{
        rank.classList.add("selected-link");
        goback.href="#rank-sec";
    }
    if(numb != 6){
        prem.classList.remove("selected-link");
    }else{
        prem.classList.add("selected-link");
        goback.href="#prem-sec";
    }
    if(numb != 7){
        last.classList.remove("selected-link");
        acesso.classList.remove("sumiracesso");
        menu.classList.remove("sumirmenu");
        main.style.width = '92%';
    }else{
        last.classList.add("selected-link");
        acesso.classList.add("sumiracesso");
        menu.classList.add("sumirmenu");
        main.style.width = '100%';
    }
}

bt_enter.addEventListener("mouseenter", () => {
    img_cat.style.bottom = '-20vh';
    goback.style.display = "none";
})
bt_enter.addEventListener("mouseout", () => {
    img_cat.style.bottom = '-70vh';
    goback.style.display = "block";
})