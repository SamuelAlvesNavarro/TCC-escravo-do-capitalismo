"use strict";
function acentral() {
    const win = window;
    win.location = "central.php";
}
var toggle = document.getElementsByClassName("mode");
const root = document.querySelector(":root");
var dark = false;
toggle[0].addEventListener('click', switchmode);
function switchmode() {
    if (root == null)
        return;
    root.classList.toggle('dark');
    if (dark) {
        toggle[0].classList.remove('fa-moon');
        toggle[0].classList.remove('fa-solid');
        toggle[0].classList.add('fa-sun');
        toggle[0].classList.add('far');
        dark = false;
        setTheme("light");
    }
    else {
        dark = true;
        setTheme("dark");
        toggle[0].classList.remove('fa-sun');
        toggle[0].classList.remove('far');
        toggle[0].classList.add('fa-moon');
        toggle[0].classList.add('fa-solid');
    }
}
function setTheme(theme) {
    localStorage.setItem("Theme", JSON.stringify(theme));
}
function getTheme() {
    const theme = JSON.parse(localStorage.getItem("Theme") || 'light');
    if (theme == "dark") {
        switchmode();
    }
}
getTheme();
function story(n) {
    const win = window;
    win.location = "story.php?story=" + n;
}
