/* VARIABLES */
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

const submit_bt = document.getElementById("submit-cadastro-bt");
const up_apelido = document.getElementById("signup-apelido");
const up_nome = document.getElementById("signup-nome");
const up_email = document.getElementById("signup-email");
const up_senha = document.getElementById("signup-senha");
const up_confsenha = document.getElementById("signup-confsenha");

/* FUNCTIONS */

function validEmail(email){
    return /^[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?$/.test(email)
}
/* CADASTRO */

up_apelido.addEventListener('change', () => {changebt()});
up_nome.addEventListener('change', () => {changebt()});
up_email.addEventListener('change', () => {changebt()});
up_senha.addEventListener('change', () => {changebt()});
up_confsenha.addEventListener('change', () => {changebt()});

function showCadastro(){
    div_cadastro.classList.toggle("container-cadastro-appear");
    div_login.classList.toggle("container-login-disappear");
    email.value = "";
    senha.value = "";
    login_bt(email.value, senha.value);
    up_apelido.value = "";
    up_nome.value = "";
    up_email.value = "";
    up_senha.value = "";
    up_confsenha.value = "";
}
function changebt(){
    if(up_apelido.value != "" && up_nome.value != "" && up_email.value != "" && up_senha.value != "" && up_confsenha.value != ""){
        submit_bt.classList.remove("sumir-submit-cadastro-bt");
    }else{
        submit_bt.classList.add("sumir-submit-cadastro-bt");
    }
}
changebt();
/* LOGIN */

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