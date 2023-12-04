

/* THEME */

const root = document.querySelector(":root");
var dark = false;

function switchmode(){
    root.classList.toggle('dark');

    if(dark){
        dark = false;
        setTheme("light");
    }else{
        dark = true;
        setTheme("dark");
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
    var revealpoint = -50;

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

    if(ac_ == 1){

        var filled = document.getElementById("filled");

        filled.style.height = (returnBar()) + "%";
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


function aceitar(n) {

    var theForm, newInput1;
    theForm = document.createElement('form');
    theForm.action = 'aprovar.php';
    theForm.method = 'post';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'id_story';
    newInput1.value = n;
    theForm.appendChild(newInput1);
    document.getElementById('hidden_form_container').appendChild(theForm);
    theForm.submit();
}
function rejeitar(n){

    let text = "Tem certeza que deseja rejeitar essa história? ela será deletada.";
    if (confirm(text) != true) {
        return;
    }

    var theForm, newInput1;
    theForm = document.createElement('form');
    theForm.action = 'deletar_historia.php';
    theForm.method = 'post';
    newInput1 = document.createElement('input');
    newInput1.type = 'hidden';
    newInput1.name = 'story';
    newInput1.value = n;
    theForm.appendChild(newInput1);
    document.getElementById('hidden_form_container').appendChild(theForm);
    theForm.submit();
}