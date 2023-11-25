
    const root = document.querySelector(":root");
    var dark = false;
    function switchmode(){
        root.classList.toggle('dark');

        if(dark){
            dark = false;
            setTheme("light");
        }else{
            dark = true;
            setTheme("dark");
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

    getTheme()


function comment_reorder(){
    var type = document.getElementById("type-s").value;

    if(type == "1"){
        document.getElementById("cont_comment").style.flexDirection = "column"
    }else if(type == "2"){
        document.getElementById("cont_comment").style.flexDirection = "column-reverse"
    }
}
/* REPORT STORY */

function report_story_toggle(){
    document.getElementById("report_story_modal").classList.toggle("appear_report_story");
}
/* REST */  




function getRndInteger(min, max) {
return Math.floor(Math.random() * (max - min) ) + min;
}

var bn = document.getElementById('banner');

/* SCROLL ANIS*/

var ac_ = 0;

window.addEventListener("scroll", reveal);

var chv_l = document.getElementById("chv-l");
var chv_r = document.getElementById("chv-r");

function reveal(){

    var controls = document.getElementById("contr");
    var reveal = document.getElementById('content-page');
    var underlines = document.getElementsByClassName("un");

    var windowH = window.innerHeight;
    var revealtop = reveal.getBoundingClientRect().top;
    var revealpoint = -50;

    if(revealtop < windowH - revealpoint){
        reveal.classList.add('active');
        bn.classList.add("modest");
        controls.classList.add("appear-controls");
        ac_ = 1;
    }else{
        reveal.classList.remove('active');
        bn.classList.remove("modest");
        controls.classList.remove("appear-controls");
        ac_ = 0;
    }
    
    if(document.body.contains(document.getElementById("comments"))){
        var comments = document.getElementById("comments");
        var commentTop = comments.getBoundingClientRect().top;
        var revealComments = -200;
    
        if(commentTop < windowH + revealComments){
            reveal.classList.remove("active");
            controls.classList.remove("appear-controls");
            ac_ = 0;
    
        }
    }

    /* RETURN BAR */

    function returnBar() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.getElementById("content-page").scrollHeight;
        var scrolled = (winScroll / height) * 100;
        
        if(scrolled > 100){
            scrolled = 100;
        }

        return scrolled;
    }

    if(ac_ == 1){

        var filled = document.getElementById("filled");

        filled.style.height = (returnBar()) + "%";
        //console.log((In_height/revealbottom))
    }
   
    for(var z = 0; z < underlines.length; z++){

        var revealtop = underlines[z].getBoundingClientRect().top;
        var revealpoint = 100;

        if(revealtop < windowH - revealpoint){
            underlines[z].classList.add("acLink");
        }else{
            underlines[z].classList.remove("acLink");
        }
    }
}

var rep_c = document.getElementById("report_comment_modal")

function rep(n){
    rep_c.classList.toggle("rep_appear");
    document.getElementById("rep_c").value=n;
}