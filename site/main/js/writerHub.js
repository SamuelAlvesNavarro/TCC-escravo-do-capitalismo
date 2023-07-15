const toggle = document.getElementById("mode");
const root = document.querySelector(":root");
var dark = false;
toggle.addEventListener('click', () => {
    root.classList.toggle('dark');

    if(dark){
        toggle.classList.remove('fa-moon');
        toggle.classList.remove('fa-solid');
        toggle.classList.add('fa-sun');
        toggle.classList.add('far');
        dark = false;
        setTheme("light");
    }else{
        dark = true;
        setTheme("dark");
        toggle.classList.remove('fa-sun');
        toggle.classList.remove('far');
        toggle.classList.add('fa-moon');
        toggle.classList.add('fa-solid');
    }
})
function setTheme(theme){
    localStorage.setItem("Theme", JSON.stringify(theme));
}
function getTheme(){
    let theme = JSON.parse(localStorage.getItem("Theme"));

    if(theme == "dark"){
        root.classList.toggle('dark');

        if(dark){
            toggle.classList.remove('fa-moon');
            toggle.classList.remove('fa-solid');
            toggle.classList.add('fa-sun');
            toggle.classList.add('far');
            dark = false;
        }else{
            dark = true;
            toggle.classList.remove('fa-sun');
            toggle.classList.remove('far');
            toggle.classList.add('fa-moon');
            toggle.classList.add('fa-solid');
        }
    }
}
getTheme();

function acentral(){
    window.location="central.php";
}
function acriacao(){
    window.location="criacao.php";
}