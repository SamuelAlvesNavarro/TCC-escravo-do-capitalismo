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


   
    var slider = document.querySelector('.slider');
    var slides = slider.children;

    var upF = 3;

    function putUp(n){

        upF += n;

        if(upF < 0) upF = slides.length-1;
        if(upF > slides.length-1) upF = 0;

        for(i = 0; i < slides.length; i++){
            if(i == upF) slides[i].style.zIndex = 1;
            else slides[i].style.zIndex = 0;
        }
    }

    putUp(1);

    var stars = document.getElementById("full-stars")

    var qP = 4.20  // <-------- MUDAR A QUANTIDADE DE ESTRELAS 
    
    stars.style.width = calcStar(qP) + "%";     
    
    function calcStar(points){
        return (100*points)/5
    }


var writings = document.getElementsByClassName("writing");
var texts = document.getElementsByClassName("text");
var exp_min = document.getElementsByClassName("exp-min");

var i = 0;
function checkStuff(n){
    writings[n].classList.toggle("appear");
    exp_min[n].classList.toggle("fa-minimize");
    exp_min[n].classList.toggle("fa-expand");
}