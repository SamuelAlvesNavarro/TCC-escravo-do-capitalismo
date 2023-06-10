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

var ageRank = document.getElementById("ageRank");
var ageValue = ageRank.value;

ageValue.addEventListener("change", () => {
    var value_age = ageRank.value;
    if(value_age = "inv"){
        results[0].style.flexDirection = "column-reverse";
    }
    if(value_age = "dir"){
        results[0].style.flexDirection = "column";
    }
})

var bestRank = document.getElementById("bestRank");
var bestValue = bestRank.value;

bestValue.addEventListener("change", () => {
    var value_age = bestRank .value;
    if(value_age = "inv"){
        results[1].style.flexDirection = "column-reverse";
    }
    if(value_age = "dir"){
        results[1].style.flexDirection = "column";
    }
})

setTimeout(showInput, 500);