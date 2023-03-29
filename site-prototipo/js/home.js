console.log('foi');
const toggle = document.getElementById("mode");
const root = document.querySelector(":root");

var dark = false;
toggle.addEventListener('click', () => {
    root.classList.toggle('dark');

    if(dark){
        toggle.classList.remove('fa-moon');
        toggle.classList.add('fa-sun');
        dark = false;
    }else{
        dark = true;
        toggle.classList.remove('fa-sun');
        toggle.classList.add('fa-moon');
    }
})