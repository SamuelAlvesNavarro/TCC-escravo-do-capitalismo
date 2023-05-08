var dark = false;
const root = document.querySelector(":root");
function switchTheme(){
    root.classList.toggle('dark');

    if(dark){
        /*toggle.classList.remove('fa-moon');
        toggle.classList.remove('fa-solid');
        toggle.classList.add('fa-sun');
        toggle.classList.add('far');*/
        dark = false;
    }else{
        dark = true;
        /*toggle.classList.remove('fa-sun');
        toggle.classList.remove('far');
        toggle.classList.add('fa-moon');
        toggle.classList.add('fa-solid');*/
    }
}

var stars = document.getElementById("full-stars")

var qP = 4.20  // <-------- MUDAR A QUANTIDADE DE ESTRELAS 

stars.style.width = calcStar(qP) + "%";     

function calcStar(points){
    return (100*points)/5
}

function rotateBook(){
    book.classList.add("rotateBook");
}
setTimeout(rotateBook, 1000);

var title_container = document.getElementById("title-container");
var book = document.getElementById("book");
var book_container = document.getElementById("containerBook");
var all = document.getElementById("all");
var readmores = document.getElementsByClassName("readmore");
var writings = document.getElementsByClassName("writing");
var texts = document.getElementsByClassName("text");
var exp_min = document.getElementsByClassName("exp-min");

setTimeout(openforEvent, 2000);

var i = 0;
function checkStuff(n){
    writings[n].classList.toggle("appear");
    exp_min[n].classList.toggle("fa-minimize");
    exp_min[n].classList.toggle("fa-expand");
}
function changeNumbers(n){
    i = n;
}
function openforEvent(){
    book.addEventListener("click", () => {
        book.classList.remove("rotateBook");
        book.style.color = "transparent";
        book_container.classList.add("befremoveBook");
        /*document.body.style.overflowY = 'hidden';*/
        setTimeout(showBody, 1500);
    })
}
function showBody(){
    book_container.style.display = 'none';
    /*document.body.style.overflowY = 'scroll';*/
    setTimeout(showElements, 100);
}
function showElements(){
    title_container.style.display = 'block';
    all.style.display = "block";
}