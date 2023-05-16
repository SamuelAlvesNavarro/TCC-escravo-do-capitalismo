function inputimgchangeval(num){
    if(num > 0){
        inputLchange = eval("inputimgLabel"+num);
        inputIchange = eval("inputimg"+num);
        inputLchange.innerHTML = inputIchange.files[0].name;
    }
    if(num < 0){
        num *= -1;
        inputLchange = eval("inputimgLabel"+num);
        inputIchange = eval("inputimg"+num);
        inputLchange.innerHTML = "Imagem " + num;
        console.log(inputIchange.files[0]);
        inputIchange.value = null;
    }
}

var inputimg1 = document.getElementById("imagem1");
var inputimg2 = document.getElementById("imagem2"); 
var inputimg3 = document.getElementById("imagem3"); 
var inputimg4 = document.getElementById("imagem4"); 
var inputimg5 = document.getElementById("imagem5"); 
var inputimg6 = document.getElementById("imagem6"); 
var inputimg7 = document.getElementById("imagem7"); 
var inputimg8 = document.getElementById("imagem8"); 
var inputimg9 = document.getElementById("imagem9"); 
var inputimg10 = document.getElementById("imagem10"); 

var inputimgLabel1 = document.getElementById("imagem1-label");
var inputimgLabel2 = document.getElementById("imagem2-label");
var inputimgLabel3 = document.getElementById("imagem3-label");
var inputimgLabel4 = document.getElementById("imagem4-label");
var inputimgLabel5 = document.getElementById("imagem5-label");
var inputimgLabel6 = document.getElementById("imagem6-label");
var inputimgLabel7 = document.getElementById("imagem7-label");
var inputimgLabel8 = document.getElementById("imagem8-label");
var inputimgLabel9 = document.getElementById("imagem9-label");
var inputimgLabel10 = document.getElementById("imagem10-label");

inputimg1.addEventListener("change", () => inputimgchangeval(1));
inputimg2.addEventListener("change", () => inputimgchangeval(2));
inputimg3.addEventListener("change", () => inputimgchangeval(3));
inputimg4.addEventListener("change", () => inputimgchangeval(4));
inputimg5.addEventListener("change", () => inputimgchangeval(5));
inputimg6.addEventListener("change", () => inputimgchangeval(6));
inputimg7.addEventListener("change", () => inputimgchangeval(7));
inputimg8.addEventListener("change", () => inputimgchangeval(8));
inputimg9.addEventListener("change", () => inputimgchangeval(9));
inputimg10.addEventListener("change", () => inputimgchangeval(10));



