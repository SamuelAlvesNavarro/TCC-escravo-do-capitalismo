const div_cadastro = document.getElementById("container-cadastro");
const div_login = document.getElementById("login");

function showCadastro(){
    div_cadastro.classList.toggle("container-cadastro-appear");
    div_login.classList.toggle("container-login-disappear");
}