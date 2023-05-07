let sheets = document.getElementsByClassName('content')
let titles = document.getElementsByClassName('sheet-title')

// titles[1].style.marginLeft = getComputedStyle(titles[0]).width

function callSheet(numb){

    var i = sheets.length - 1

    while (i >= 0){

        if(i != numb) {

            sheets[i].classList.remove("tfront")
            titles[i].classList.remove("tfront")
            titles[i].classList.add("hiddenT")
            sheets[i].classList.add("hidden")

        } else if(i == numb) {

            sheets[i].classList.remove("hidden")
            titles[i].classList.remove("hiddenT")
            sheets[i].classList.add("tfront")
            titles[i].classList.add("tfront")

        }

        i--
    }

    return 
}

var menu = document.getElementById("menu");
var menuIt = document.getElementById("menuIt")

menu.addEventListener("click", () => {
    menuIt.classList.toggle("appear")
    menu.classList.toggle("xmenu")
})

// STARS 

var stars = document.getElementById("full-stars")

var qP = 4.20  // <-------- MUDAR A QUANTIDADE DE ESTRELAS 

stars.style.width = calcStar(qP) + "%";     

function calcStar(points){
    return (100*points)/5
}

var changet = document.getElementById("picsInside")

function change(){

    var textt = document.getElementById("testChange").value
    changet.innerHTML = textt
    
    return

}
function addT(textToAdd){

    var textt = document.getElementById("testChange")

    if(textToAdd == "color"){
        textToAdd = "<span style = 'color: rgb(0, 255, 255);'> SEU TEXTO </span>"
    }

    textt.value += textToAdd
    
    return

}