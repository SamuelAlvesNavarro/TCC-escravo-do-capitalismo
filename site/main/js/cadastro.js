function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}

var all = document.getElementById('all');

function getBloody(){
    all.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
}

getBloody();


    /* DARK MODE */

const root = document.querySelector(":root");

function switchmode(){
    root.classList.toggle('dark');
}
function getTheme(){
    let theme = JSON.parse(localStorage.getItem("Theme"));

    if(theme == "dark"){
        switchmode();
    }
}

getTheme()



/* SLIDE */
var senha = document.getElementById("senha")
    var senha2 = document.getElementById("Confsenha")

var chv_left = document.getElementById("chv-left");
var chv_right = document.getElementById("chv-right");
var current = 0;
var slides = document.getElementsByClassName("slide");

    function dis(){
        slides[current].classList.remove('current');
    }
    function removeCurrent(){
        slides[current].classList.remove('fadeIn');
        slides[current].classList.add('fadeOut');

        setTimeout(dis, 200)
    }
    function addNew(n){
        slides[current].classList.remove('fadeOut');
        slides[n].classList.add('current');
        slides[n].classList.add('fadeIn');
        current = n;
    }
    function generatePrev(n){
        var prevDivV = document.getElementById("prev-cont")

        prevDiv = '';

        if(document.getElementById('nome').value != '' && n != 0) prevDiv = prevDiv + "<div class='prev-lib'>Nome: <val>" + document.getElementById('nome').value + "</val></div>";
        if(document.getElementById('apelido').value != '' && n != 1) prevDiv = prevDiv + "<div class='prev-lib'>Apelido: <val>" + document.getElementById('apelido').value + "</val></div>";
        if(document.getElementById('email').value != '' && n != 2){
            if(validateEmail(document.getElementById('email').value)){
                prevDiv = prevDiv + "<div class='prev-lib'>Email: <val>" + document.getElementById('email').value + "</val></div>";
            }
            else{
                var x = document.getElementById('email').value;
                x = "inválido"
                prevDiv = prevDiv + "<div class='prev-lib'>Email: <val>" + x + "</val></div>";
         
            }
        } 
        if(senha.value != '' && n == 5){
            var se = document.getElementById('senha').value;
            var sen = '';
            for(var i = 0; i < se.length; i++){
                sen += '*';
            }
            prevDiv = prevDiv + "<div class='prev-lib' type='password'>Senha: <val>" + sen + "</val></div>";
        }
        if(senha2.value != '' && n == 5){

            if(senha.value == senha2.value)prevDiv = prevDiv + "<div class='prev-lib'>Confirmada: <val><i class='fa-solid fa-check'></i></val></div>";
            else{
                prevDiv = prevDiv + "<div class='prev-lib'>Confirmada: <val><i class='fa-solid fa-xmark'></i></val></div>";
            }
        }

        prevDivV.innerHTML = prevDiv;

        prevSlide = document.getElementsByClassName('prev')

        prevSlide[n].innerHTML = prevDiv;
    }

    var lastTime = 0;
    function setSlide(n){

    
        var now = new Date().getTime(); // Time in milliseconds
        if (now - lastTime < 2000) {
            return;
        } else {
            lastTime = now;
        }

        generatePrev(n)
        getBloody()
        if(n == 0){
            chv_left.classList.remove("fadeIn");
            chv_left.classList.add("fadeOut");
        }else{
            chv_left.classList.add("fadeIn");
            chv_left.classList.remove("fadeOut");
        }

        if(n == slides.length-1){
            chv_right.classList.remove("fadeIn");
            chv_right.classList.add("fadeOut");
        }else{
            chv_right.classList.add("fadeIn");
            chv_right.classList.remove("fadeOut");
        }

        removeCurrent();

        setTimeout(addNew, 1000, n)
    }


    function toLast(){
        var last = current - 1;

        if(current - 1 < 0) last = slides.length-1

        setSlide(last)
    }
    function toNext(){
        var next = current + 1;

        if(current + 1  > slides.length-1) next = 0

        setSlide(next)
    }

    setSlide(0)

    /* SENHA */


    senha.addEventListener("mouseenter", () => {
        senha.type = 'text';
    })
    senha.addEventListener("mouseout", () => {
        senha.type = 'password';
    })

    senha2.addEventListener("mouseenter", () => {
        senha2.type = 'text';
    })
    senha2.addEventListener("mouseout", () => {
        senha2.type = 'password';
    })

    /* SEND */
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }

    var send = document.getElementById('send')

    send.addEventListener("click", () => {

        if(document.getElementById('nome').value == '') setSlide(0)
        else if(document.getElementById('apelido').value == '') setSlide(1)
        else if(document.getElementById('email').value == '' || !validateEmail(document.getElementById('email').value)) setSlide(2)
        else if(senha.value == '') setSlide(3)
        else if(senha2.value == '' || senha.value != senha2.value) setSlide(4)
        
        leave();

    })
    send.addEventListener("mouseenter", () => {
        all.classList.add("darken");
    })
    send.addEventListener("mouseleave", () => {
        leave();
    })

    function leave(){
        all.classList.remove("darken");
    }


    document.addEventListener('keyup', (event) => {
        var name = event.key;
        if (name === 'ArrowRight' || name === 'Enter') {
            toNext();
        }
        if (name === 'ArrowLeft') {
            toLast();
        }

      }, false);