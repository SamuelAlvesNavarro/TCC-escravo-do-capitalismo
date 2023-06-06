const toggle = document.getElementById("mode");
const root = document.querySelector(":root");
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

var search_i = document.getElementById("search-input");
var search_div = document.getElementById("search-div");
search_i.addEventListener("change", () => {
    if(search_i.value != ""){
        search_div.classList.add("has-value")
    }else{
        search_div.classList.remove("has-value")
    }
})

function apesquisa(){
    window.location="pesquisa.php";
}
function aloja(){
    window.location="loja.php";
}

function anchor(anchor){
    window.location.href = "#"+anchor;
}