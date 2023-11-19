var dark = false;
const root = document.querySelector(":root");
function switchmode(){
    root.classList.toggle('dark');

    if(dark){
        dark = false;
    }else{
        dark = true;
    }
}


var plus_minus = document.getElementById("del");

var details = document.getElementsByClassName("detail");

function switchDetails(){
    plus_minus.classList.toggle("fa-plus");
    plus_minus.classList.toggle("fa-minus");

    var t = 0;

    for(t = 0; t < details.length; t++){
        details[t].classList.toggle("dis");
    }
}

function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}



var all = document.getElementById('all');

function getBloody(){
    all.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
}

getBloody();