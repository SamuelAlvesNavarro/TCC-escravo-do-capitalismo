function setTheme(theme){
    localStorage.setItem("Theme", JSON.stringify(theme));
}
function getTheme(){
    let theme = JSON.parse(localStorage.getItem("Theme"));

    if(theme == "dark"){
        switchmode();
    }
}
getTheme();