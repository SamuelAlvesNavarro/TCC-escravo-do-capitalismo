var toggle = document.getElementsByClassName("mode");
const root = document.querySelector(":root");
var dark = false;
toggle[0].addEventListener('click', switchmode)

function switchmode(){
    root.classList.toggle('dark');

    if(dark){
        toggle[0].classList.remove('fa-moon');
        toggle[0].classList.remove('fa-solid');
        toggle[0].classList.add('fa-sun');
        toggle[0].classList.add('far');
        dark = false;
        setTheme("light");
    }else{
        dark = true;
        setTheme("dark");
        toggle[0].classList.remove('fa-sun');
        toggle[0].classList.remove('far');
        toggle[0].classList.add('fa-moon');
        toggle[0].classList.add('fa-solid');
    }
}
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

var oops = document.getElementsByClassName("oop")
var pages = document.getElementsByClassName("page")

function changeOop(n){
    for(var i = 0; i < oops.length; i++){
        oops[i].classList.remove('active_oop');
        pages[i].classList.remove('active-pg');
    }
    oops[n].classList.add('active_oop');
    pages[n].classList.add('active-pg');
}

changeOop(0);

function story(n){
    window.location = "story.php?story=" + n;
}

function sortAndReturn(orders, scores){

    //1) combine the arrays:
    var list = [];
    for (var j = 0; j < orders.length; j++) 
        list.push({'order': orders[j], 'score': scores[j]});

    //2) sort:
    list.sort(function(a, b) {
        return ((a.score < b.score) ? -1 : ((a.score == b.score) ? 0 : 1));
        //Sort could be modified to, for example, sort on the age 
        // if the name is the same. See Bonus section below
    });

    //3) separate them back out:
    for (var k = 0; k < list.length; k++) {
        orders[k] = list[k].order;
        scores[k] = list[k].score;
    }

    return orders;
}

const st = document.getElementsByClassName('story');
var orders = [];
var scores = [];

for(var i  = 0; i < st.length; i++){
    orders.push(i);
    scores.push(st[i].getAttribute("score"));
}

function valC(){

    var select = document.getElementById("type-s").value;

    if(select == 'newer'){
        for(var i  = 0; i < st.length; i++){
            st[i].style.order = i+1;
        }
    }
    else if(select == 'older'){
        for(var i  = 0; i < st.length; i++){
            st[i].style.order = st.length-i;
        }
    }
    else{
        var sorted_arr = sortAndReturn(orders, scores);
        
        if(select == "bigS"){
            for(var i  = 0; i < st.length; i++){
                st[sorted_arr[i]].style.order = st.length-i;
            }
        }
        if(select == "smallS"){
            for(var i  = 0; i < st.length; i++){
                st[sorted_arr[i]].style.order = i;
            }
        }
    }
}


function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}

var all = document.querySelector('body');

all.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';