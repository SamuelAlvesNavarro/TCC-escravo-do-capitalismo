var toggle = document.getElementsByClassName("mode");
const root = document.querySelector(":root");
var dark = false;
toggle[0].addEventListener('click', switchmode)
toggle[1].addEventListener('click', switchmode)

function switchmode(){
    root.classList.toggle('dark');

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
    }else{
        dark = true;
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

function showInput(){
    var search_div = document.getElementById("search-div");
    search_div.classList.add("has-value");
}
function apesquisa(){
    window.location="pesquisa.php";
}
function aloja(){
    window.location="loja.php";
}

function anchor(anchor){
    window.location.href = "#"+anchor;
}



var results = document.getElementsByClassName("results");
var bestRank = document.getElementById("bestRank");
var ageRank = document.getElementById("ageRank");

ageRank.addEventListener("change", () => {ranks(0)})
bestRank.addEventListener("change", () => {ranks(1)})

function ranks(n){

    if(n == 0) var spin = "ageRankA";
    if(n == 1) var spin = "bestRankA";
    
    var spinA = document.getElementsByClassName(spin);

    for(var i = 0; i < spinA.length; i++){
        spinA[i].style.order = spinA[i].style.order * -1;
    }
}

//ranks(0);
//ranks(1);
setTimeout(showInput, 500);