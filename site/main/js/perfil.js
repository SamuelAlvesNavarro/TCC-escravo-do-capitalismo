function showDe(){
    var dc = document.getElementById("dcont");
    dc.classList.toggle("appear-de");
}

var senha = document.getElementById("senha");

senha.addEventListener("mouseover", () => {
    senha.type = "text";
})
senha.addEventListener("mouseleave", () => {
    senha.type = "password";
})

var menu = document.getElementById("acmenu");

function callMenu(){
    menu.classList.remove("menu-dis");
}

setTimeout(function(){callMenu()}, 200)