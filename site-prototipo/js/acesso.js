const div_cadastro = document.getElementById("container-cadastro");
const div_login = document.getElementById("container-login");
const div_all = document.getElementById("all");

var whichimg = parseInt(Math.random() * 10);

whichimg = whichimg+1;

console.log(whichimg);
linkimg = "../img/"+whichimg+".jpg";
var linkimg = 'url('+linkimg+')';
div_all.style.backgroundImage = linkimg;


function showCadastro(){
    div_cadastro.classList.toggle("container-cadastro-appear");
    div_login.classList.toggle("container-login-disappear");
}