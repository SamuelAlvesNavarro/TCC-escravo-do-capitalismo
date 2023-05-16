var previewd = document.getElementById("preview-div");

var slider = document.getElementById('slider');
var slides = document.getElementsByClassName('slide');
var trial = 0;
var upF = 3;
// DO CRIACAO


// DO PREVIEW 
var titulo = document.getElementById("")


// funcao
function preview(){
    previewd.classList.toggle("preview-appear");
    showPreview();
}
function showPreview(){

    if(slides.length == 1){
        var sideBar = document.getElementById("sideBar");
        sideBar.style.display = "none";
    }

    trial = 0;
    upF = 3;

    
    var output = document.getElementsByClassName("output");
    var inputimg = document.getElementsByClassName("input-file");
    
    for(i = 0; i < 10; i++){
        const [file] = inputimg[i].files
        if (file) {
            output[i].src = URL.createObjectURL(file)
        }
    }
    
    var story_text = document.getElementById("story-text");

    if(document.getElementById("conteudo-historia").value != ""){
        story_text.innerHTML = document.getElementById("conteudo-historia").value;
    } 
    else{
        story_text.innerHTML = "<h4>História</h4>";
    } 

    putUp(1);
}
function setHeight(z){
    slider.style.height = z + 100 + 'px';
}
function putUp(n){

    if(slides.length == 1 && trial > 0){
        
        console.log("Não há outras páginas para carregar");
        return;
    }

    trial++;
    
    upF += n;

    var x = 10;

    if(upF < 0) upF = slides.length-1;
    if(upF > slides.length-1) upF = 0;

    for(i = 0; i < slides.length; i++){
        if(i == upF){
            slides[i].style.zIndex = 1;
            slides[i].style.transform = 'rotate(0deg)';
            slides[i].classList.remove("behindSheet");
            setHeight(slides[i].offsetHeight);
        } 
        else{
            var num = parseInt(Math.random() * (2*x)) - x;
            slides[i].style.zIndex = 0;
            slides[i].style.transform = 'rotate('+num+'deg)';
            slides[i].classList.add("behindSheet");
        } 
    }
}

var writings = document.getElementsByClassName("writing");
var texts = document.getElementsByClassName("text");
var exp_min = document.getElementsByClassName("exp-min");


var i = 0;

function checkStuff(n){
    writings[n].classList.toggle("appear");
    exp_min[n].classList.toggle("fa-minimize");
    exp_min[n].classList.toggle("fa-expand");
    setHeight(slides[n].offsetHeight);
}
