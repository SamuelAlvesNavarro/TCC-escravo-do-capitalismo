/*var toggle = document.getElementsByClassName("mode");

toggle[0].addEventListener('click', switchmode)
toggle[1].addEventListener('click', switchmode)*/

const root = document.querySelector(":root");
var dark = false;
function switchmode(){
    root.classList.toggle('dark');

    if(dark){
        dark = false;
        setTheme("light");
    }else{
        dark = true;
        setTheme("dark");
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