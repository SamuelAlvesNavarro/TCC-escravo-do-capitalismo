const div_cadastro = document.getElementById("container-cadastro");
const div_login = document.getElementById("container-login");
const div_login_n = document.getElementById("login");
const form_login = document.getElementById("login-form");
var email = document.getElementById("input-email");
var senha = document.getElementById("input-senha");
const div_all = document.getElementById("all");
const div_after = document.getElementById("after");
var login_submit = document.getElementById("submit-login");
var arrow = document.getElementById("arrowthing");
var whichimg = parseInt(Math.random() * 10);

whichimg = whichimg+1;

console.log(whichimg);
linkimg = "../img/"+whichimg+".jpg";
var linkimg = 'url('+linkimg+')';
div_all.style.backgroundImage = linkimg;

function validEmail(email){
    return /^[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?$/.test(email)
}
function showCadastro(){
    div_cadastro.classList.toggle("container-cadastro-appear");
    div_login.classList.toggle("container-login-disappear");
    email.value = "";
    senha.value = "";
    login_bt(email.value, senha.value);
}
function toBlack(){
    div_all.style.backgroundImage = 'linear-gradient(to left, rgb(66, 63, 63), black)';
}

senha.addEventListener('change', () => {login_bt(email.value, senha.value)});
email.addEventListener('change', () => {login_bt(email.value, senha.value)});

function login_bt(em, se){

    if(se && em && validEmail(em)){
        login_submit.classList.add("filled-login-bt");
        arrow.classList.add("arrowappear");
    }else{
        login_submit.classList.remove("filled-login-bt");
        arrow.classList.remove("arrowappear");
    }
}

div_after.addEventListener("click", () => {

    if(login_submit.classList.contains("filled-login-bt") && arrow.classList.contains("arrowappear")){
        form_login.submit();
    }
})
