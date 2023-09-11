

/* THEME */

var toggle = document.getElementsByClassName("mode");
const root = document.querySelector(":root");
var dark = false;
toggle[0].addEventListener('click', switchmode)

function switchmode(){
    root.classList.toggle('dark');

    if(dark){
        toggle[0].classList.remove('fa-moon');
        toggle[0].classList.remove('fa-solid');
        toggle[0].classList.add('fa-sun');
        toggle[0].classList.add('far');
        dark = false;
        setTheme("light");
    }else{
        dark = true;
        setTheme("dark");
        toggle[0].classList.remove('fa-sun');
        toggle[0].classList.remove('far');
        toggle[0].classList.add('fa-moon');
        toggle[0].classList.add('fa-solid');
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


getTheme();
/* REST */  




function getRndInteger(min, max) {
return Math.floor(Math.random() * (max - min) ) + min;
}

var bn = document.getElementById('banner');

function getBloody(){
    bn.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
}

getBloody();


/* REFER CONTROL */

var nS = 1;

var changePos = document.getElementsByClassName("pageRefer");

var subTitle = document.getElementById("subTitle");

var pgs = document.getElementsByClassName("pg");

function toLast(){
    if(nS != 0) changePosN(nS - 1);
    else changePosN(changePos.length - 1)
}
function toNext(){
    if(nS != changePos.length - 1) changePosN(nS + 1);
    else changePosN(0)
}



function changePosN(n){
    if(changePos.length == 2){

        changePos[n].style.order = 1;
        changePos[n].classList.add("superRefer");

        nS = n;

        if(n == 0){
            changePos[1].style.order = 2;

            subTitle.innerHTML = "Referências"; 
            
            pgs[0].style.display = "none";
            pgs[1].style.display = "block";
        }
        else if(n == 1){

            changePos[0].style.order = 2;            
            
            subTitle.innerHTML = "História";

            pgs[0].style.display = "block";
            pgs[1].style.display = "none";
        }

        for(var i  = 0; i < changePos.length; i++){
            if(i != n){
                changePos[i].classList.remove("superRefer");
            }
        }

    }else{

        changePos[n].style.order = 2;
        changePos[n].classList.add("superRefer");

        nS = n;

        if(n == 0){
            changePos[1].style.order = 3;
            changePos[2].style.order = 1;

            subTitle.innerHTML = "Referências"; 
            
            pgs[0].style.display = "none";
            pgs[1].style.display = "none";
            pgs[2].style.display = "block";
        }
        else if(n == 1){
            changePos[0].style.order = 1;
            changePos[2].style.order = 3;

            subTitle.innerHTML = "História";

            pgs[0].style.display = "block";
            pgs[1].style.display = "none";
            pgs[2].style.display = "none";
        }
        else if(n == 2){
            changePos[0].style.order = 3;
            changePos[1].style.order = 1;

            subTitle.innerHTML = "Imagens";

            pgs[0].style.display = "none";
            pgs[1].style.display = "block";
            pgs[2].style.display = "none";
        }

        for(var i  = 0; i < changePos.length; i++){
            if(i != n){
                changePos[i].classList.remove("superRefer");
            }
        }
    }
}

changePosN(1);

/* SCROLL ANIS*/

var ac_ = 0;

window.addEventListener("scroll", reveal);

var chv_l = document.getElementById("chv-l");
var chv_r = document.getElementById("chv-r");

function reveal(){

    var controls = document.getElementById("contr");
    var reveal = document.getElementById('content-page');
    var underlines = document.getElementsByClassName("un");

    var windowH = window.innerHeight;
    var revealtop = reveal.getBoundingClientRect().top;
    var revealpoint = 100;

    if(revealtop < windowH - revealpoint){
        reveal.classList.add('active');
        bn.classList.add("modest");
        controls.classList.add("appear-controls");
        ac_ = 1;
    }else{
        reveal.classList.remove('active');
        bn.classList.remove("modest");
        controls.classList.remove("appear-controls");
        ac_ = 0;
    }
    
    if(document.body.contains(document.getElementById("comments"))){
        var comments = document.getElementById("comments");
        var commentTop = comments.getBoundingClientRect().top;
        var revealComments = -200;
    
        if(commentTop < windowH + revealComments){
            reveal.classList.remove("active");
            controls.classList.remove("appear-controls");
            ac_ = 0;
    
            chv_l.classList.add("sum_l");
            chv_r.classList.add("sum_r");
    
        }else{
            chv_l.classList.remove("sum_l");
            chv_r.classList.remove("sum_r");
        }
    }

    /* RETURN BAR */

    function returnBar() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.getElementById("content-page").scrollHeight;
        var scrolled = (winScroll / height) * 100;
        
        if(scrolled > 100){
            scrolled = 100;
        }
        
        return scrolled;
    }

    if(ac_ == 1 && nS == 1){

        var filled = document.getElementById("filled");

        filled.style.height = (returnBar()) + "%";
        //console.log((In_height/revealbottom))
    }
   
    for(var z = 0; z < underlines.length; z++){

        var revealtop = underlines[z].getBoundingClientRect().top;
        var revealpoint = 100;

        if(revealtop < windowH - revealpoint){
            underlines[z].classList.add("acLink");
        }else{
            underlines[z].classList.remove("acLink");
        }
    }
}