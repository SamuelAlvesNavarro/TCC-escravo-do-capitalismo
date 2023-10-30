var displays = document.getElementsByClassName("display-items");
var item_shops = document.getElementsByClassName("items");
var price_displays = document.getElementsByClassName("price-display");
var img_display = document.getElementsByClassName("img-display");
var nome_display = document.getElementsByClassName("nome-display");
var buttons_buy_e = document.getElementsByClassName("buy");
var current = 0;
var section = document.getElementsByClassName("section");
var s_t = document.getElementById("search_text");
var items = document.getElementsByClassName("item");
var item_name = document.getElementsByClassName("item-name");

const root = document.querySelector(":root");
var checks = document.getElementsByClassName("check-item");
var types = document.getElementsByClassName("type");
var item_display = document.getElementById("item_display")

var n = 0;

function show_item(pos, code, id){
    for(var i = 0; i < checks.length; i++){
        checks[i].checked = false;
        types[i].style.display = "none";
    }
    item_display.style.display = "flex";
    document.getElementById("item_display_photo").src = document.getElementsByClassName("item_img")[pos].src
    
    document.getElementById("item_nome_title").innerHTML = 
        document.getElementsByClassName("item-name")[pos].innerHTML

    if(code == 0) code = "Foto"
    if(code == 1) code = "Fundo"

    document.getElementById("sub").innerHTML = code

    document.getElementById("price_display").innerHTML = 
        document.getElementsByClassName("price")[pos].innerHTML

    n = id;
}


function switchmode(){
    root.classList.toggle('dark');
}

function check(n){
    checks[n].checked = true;
    item_display.style.display = "none";

    for(var i = 0; i < types.length; i++){
        if(i != n)types[i].style.display = "none";
        else{
            types[i].style.display = "flex";
        }
    }
}

check(0)



function search(){
    var search = (s_t.value).toLowerCase();

    for(var i = 0; i < items.length; i++){
        let text = (item_name[i].innerHTML).toLowerCase();

        if(text.includes(search)){
            items[i].style.display = "block";
        }else{
            items[i].style.display = "none";
        }
    }

    if(item_display.style.display != "none"){
        check(0)
    }
}



function buy() {

    if(n == 0) return;

    var theForm, input_cod;
    theForm = document.createElement('form');
    theForm.action = 'compra.php';
    theForm.method = 'post';
    input_cod = document.createElement('input');
    input_cod.type = 'hidden';
    input_cod.name = 'gadget';
    input_cod.value = n;
    theForm.appendChild(input_cod);
    document.getElementById('hidden_form_container').appendChild(theForm);
    theForm.submit();

}