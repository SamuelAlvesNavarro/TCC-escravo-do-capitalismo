viewPortHeight = window.innerHeight + "px";

const toggle = document.getElementById("mode");
const root = document.querySelector(":root");

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

function SwitchColor(numb){
    if(numb != 1){
        home.classList.remove("selected-link");
    }else{
        home.classList.add("selected-link");
    }
    if(numb != 2){
        exp.classList.remove("selected-link");
    }else{
        exp.classList.add("selected-link");
    }
    if(numb != 3){
        beh.classList.remove("selected-link");
    }else{
        beh.classList.add("selected-link");
    }
    if(numb != 4){
        wys.classList.remove("selected-link");
    }else{
        wys.classList.add("selected-link");
    }
    if(numb != 5){
        rank.classList.remove("selected-link");
    }else{
        rank.classList.add("selected-link");
    }
    if(numb != 6){
        prem.classList.remove("selected-link");
    }else{
        prem.classList.add("selected-link");
    }
    if(numb != 7){
        last.classList.remove("selected-link");
    }else{
        last.classList.add("selected-link");
    }
}