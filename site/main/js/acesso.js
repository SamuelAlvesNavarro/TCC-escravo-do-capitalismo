/* VARIABLES */
const div_login = document.getElementById("container-login");
const div_login_n = document.getElementById("login");
const form_login = document.getElementById("login-form");
var email = document.getElementById("input-email");
var senha = document.getElementById("input-senha");
const div_all = document.getElementById("all");
const div_after = document.getElementById("after");
var login_submit = document.getElementById("submit-login");
var arrow = document.getElementById("arrowthing");

/* FUNCTIONS */

function validEmail(email){
    return /^[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?$/.test(email)
}

document.addEventListener('keyup', (event) => {
    var name = event.key;
    if (name === 'Enter' && senha.value && email.value) {
        form_login.submit();
    }

  }, false);

/* LOGIN */

senha.addEventListener('change', () => {login_bt(email.value, senha.value)});
email.addEventListener('change', () => {login_bt(email.value, senha.value)});

function login_bt(em, se){

    if(se && em //&& validEmail(em)
    ){
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