var dark = false;
const root = document.querySelector(":root");
function switchTheme(){
    root.classList.toggle('dark');

    if(dark){
        dark = false;
    }else{
        dark = true;
    }
}

window.addEventListener("scroll", reveal);

function reveal(){
    var reveals = document.getElementsByClassName('card');

    for(var i = 0; i < reveals.length; i++){

        var windowH = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 150;

        if(revealtop < windowH - revealpoint){
            reveals[i].classList.add('active');
        }else{
            reveals[i].classList.remove('active');
        }
    }
}

function acentral(){
    console.log("aaa")
    window.location="central.php";
}