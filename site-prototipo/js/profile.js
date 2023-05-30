var dark = false;
const root = document.querySelector(":root");
function switchTheme(){
    root.classList.toggle('dark');

    if(dark){
        dark = false;
    }else{
        dark = true;
    }
}
switchTheme();
