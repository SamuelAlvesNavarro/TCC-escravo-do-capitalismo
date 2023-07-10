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
        toggle.classList.remove('fa-solid');
        toggle.classList.add('fa-sun');
        toggle.classList.add('far');
        dark = false;
    }else{
        dark = true;
        toggle.classList.remove('fa-sun');
        toggle.classList.remove('far');
        toggle.classList.add('fa-moon');
        toggle.classList.add('fa-solid');
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

// expls

const homeexpl = document.getElementById("home-link-expl");
const expexpl = document.getElementById("exp-link-expl");
const behexpl = document.getElementById("beh-link-expl");
const wysexpl = document.getElementById("wys-link-expl");
const rankexpl = document.getElementById("rank-link-expl");
const premexpl = document.getElementById("prem-link-expl");
const lastexpl = document.getElementById("last-link-expl");

function showexpl(numb){
    homeexpl.classList.remove("link-expl-appear");
    expexpl.classList.remove("link-expl-appear")
    behexpl.classList.remove("link-expl-appear")
    wysexpl.classList.remove("link-expl-appear")
    rankexpl.classList.remove("link-expl-appear")
    premexpl.classList.remove("link-expl-appear")
    lastexpl.classList.remove("link-expl-appear")

    if(numb == 1)homeexpl.classList.add("link-expl-appear");
    if(numb == 2)expexpl.classList.add("link-expl-appear");
    if(numb == 3)behexpl.classList.add("link-expl-appear");
    if(numb == 4)wysexpl.classList.add("link-expl-appear");
    if(numb == 5)rankexpl.classList.add("link-expl-appear");
    if(numb == 6)premexpl.classList.add("link-expl-appear");
    if(numb == 7)lastexpl.classList.add("link-expl-appear");
}

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

SwitchColor(1);