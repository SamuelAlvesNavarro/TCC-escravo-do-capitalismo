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
    const theme = JSON.parse(localStorage.getItem("Theme"));
    
    if (theme == "dark") {
        switchmode();
    }
}
getTheme();
function story(n) {
    const win = window;
    win.location = "story.php?story=" + n;
}






function buscar(){
    
    var query = document.getElementById("query").value;

    $.ajax({  
        type: 'GET',
        url: '../pages/generateResults.php', 
        data: { busca: query },
        success: function(response) {
            document.getElementById("results").innerHTML = response;
        }
    });

    
}

function setFundo(num){
    var fundo = document.getElementsByClassName("action")[num].getAttribute("img");
    
    document.getElementById("all").style.backgroundImage = '';
    
    if(dark)document.getElementById("all").style.backgroundImage = fundo;
    
    if(fundo == 'linear-gradient(rgb(50,50,50), rgb(0,0,0));'){
        document.getElementById("all").style.animationName = 'none';
    }else{
        document.getElementById("all").style.animationName = 'pulse';
    }
    
}
function picG(num){
    setFundo(num)
}
buscar()