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




const slider = document.querySelector('.slider');
const slideWidth = slider.clientWidth;
let currentIndex = 0;
let intervalId;

function slideTo(index) {
    currentIndex = index;

    if(currentIndex != 0){
        slider.classList.add("transitionAnni");
    }
    else{
        slider.classList.remove("transitionAnni");
    }

    slider.style.transform = `translateX(-${index * slideWidth}px)`;
}

function startAutoAdvance() {
    intervalId = setInterval(() => {
        currentIndex = (currentIndex + 1) % slider.children.length;
        slideTo(currentIndex);
    }, 5000); // Change slide every 3 seconds
}

function stopAutoAdvance() {
    clearInterval(intervalId);
}

startAutoAdvance();

slider.addEventListener('mouseenter', stopAutoAdvance);
slider.addEventListener('mouseleave', startAutoAdvance);



var all = document.getElementById('all');

function getBloody(){
    all.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
}

getBloody();