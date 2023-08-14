/*var toggle = document.getElementsByClassName("mode");

toggle[0].addEventListener('click', switchmode)
toggle[1].addEventListener('click', switchmode)*/

const root = document.querySelector(":root");
var dark = false;
function switchmode(){
    root.classList.toggle('dark3');

    if(dark){
        toggle[0].classList.remove('fa-moon');
        toggle[0].classList.remove('fa-solid');
        toggle[0].classList.add('fa-sun');
        toggle[0].classList.add('far');
        toggle[1].classList.remove('fa-moon');
        toggle[1].classList.remove('fa-solid');
        toggle[1].classList.add('fa-sun');
        toggle[1].classList.add('far');
        dark = false;
        setTheme("light");
    }else{
        dark = true;
        setTheme("dark");
        toggle[0].classList.remove('fa-sun');
        toggle[0].classList.remove('far');
        toggle[0].classList.add('fa-moon');
        toggle[0].classList.add('fa-solid');
        toggle[1].classList.remove('fa-sun');
        toggle[1].classList.remove('far');
        toggle[1].classList.add('fa-moon');
        toggle[1].classList.add('fa-solid');
    }
}
function setTheme(theme){
    localStorage.setItem("Theme", JSON.stringify(theme));
}
function getTheme(){
    let theme = JSON.parse(localStorage.getItem("Theme"));

    if(theme == "dark"){
        switchmode();
    }
}

function showDe(){
    var dc = document.getElementById("dcont");
    dc.classList.toggle("appear-de");
}

var menu2 = document.getElementById("acmenu");

function callMenu(){
    menu2.classList.remove("menu-dis");
}

setTimeout(function(){callMenu()}, 200)

getTheme();


var senha = document.getElementById("senha");

senha.addEventListener("mouseover", () => {
    senha.type = "text";
})
senha.addEventListener("mouseleave", () => {
    senha.type = "password";
})