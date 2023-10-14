"use strict";
function acentral() {
    const win = window;
    win.location = "central.php";
}
var toggle = document.getElementsByClassName("mode");
const root = document.querySelector(":root");
var dark = false;
function switchmode() {
    if (root == null)
        return;
    root.classList.toggle('dark');
    if (dark) {
        dark = false;
        setTheme("light");
    }
    else {
        dark = true;
        setTheme("dark");
    }
}
function setTheme(theme) {
    localStorage.setItem("Theme", JSON.stringify(theme));
}
function getTheme() {
    const theme = JSON.parse(localStorage.getItem("Theme") || 'light');
    if (theme == "dark") {
        switchmode();
    }
}
getTheme();
function story(n) {
    const win = window;
    win.location = "story.php?story=" + n;
}






var pgs = document.getElementsByClassName('pg')

var pages = [];

function buscar(){
    var query = document.getElementById("query").value;

    $.ajax({  
        type: 'GET',
        url: '../pages/test2.php', 
        data: { busca: query },
        success: function(response) {
            document.getElementById("results").innerHTML = response;

            pgs = document.getElementsByClassName('pg')

            pages = [];

            for(var z = 0; z < pgs.length; z++){
                pages.push(z);
            }

            generate(0)
        }
    });

    
}
function orgPages(num){
    var t = pages.indexOf(num)

    for(var i = 0; i < t; i++){

        pgs[pages[0]].classList.add("off-screen-ani");

        pages.push(pages[0]);

        pages.shift();
        
    }
}
function setFundo(num){
    var fundo = document.getElementsByClassName("action")[num].getAttribute("img");
    
    document.getElementById("all").style.backgroundImage = '';
    document.getElementById("all").style.backgroundImage = fundo;

    if(fundo == 'linear-gradient(rgb(50,50,50), rgb(0,0,0));'){
        document.getElementById("all").style.animationName = 'none';
    }else{
        document.getElementById("all").style.animationName = 'pulse';
    }
    
    
}
function generate(num){

    orgPages(num);

    var number_to_appear = 5;

    if(pages.length <= 5){
        number_to_appear = pages.length;
    }

    var starter_width = 700;
    var starter_bottom = -100;
    var starter_bottom_changer = 0;
    var starter_bottom_upper = 25;
    var starter_bottom_changer_changer = (starter_bottom_upper/(number_to_appear-1));
    var starter_z_index = pgs.length;
    var starter_white = 0;

    function changeVs(i){

        if( pgs[pages[i]].classList.contains("off-screen-ani")){
            
            setTimeout( () => {

                pgs[pages[i]].classList.remove("off-screen-ani");
                pgs[pages[i]].classList.add("back")
            
            }, 400);
        }

        pgs[pages[i]].style.width = starter_width + "px";
        pgs[pages[i]].style.bottom = starter_bottom + "px";
        pgs[pages[i]].style.backgroundColor = "rgb("+(240+starter_white)+","+(225+starter_white)+","+(204+starter_white)+")";

        pgs[pages[i]].style.zIndex = starter_z_index;

        starter_width -= 50;
        starter_bottom += (starter_bottom_upper - starter_bottom_changer);
        starter_z_index -= 1;
        starter_white -= 30;
        starter_bottom_changer += starter_bottom_changer_changer;

        setTimeout( () => 
        {
            pgs[i].classList.remove("back");

        }, 450)
    }

    for(var i = 0; i < pgs.length; i++){
        changeVs(i);
    }

    
}

function picG(num){
    generate(num)
    
    setFundo(num)
}
buscar()