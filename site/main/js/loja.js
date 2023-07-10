var displays = document.getElementsByClassName("display-items");
var item_shops = document.getElementsByClassName("items");
var price_displays = document.getElementsByClassName("price-display");
var img_display = document.getElementsByClassName("img-display");
var buttons_buy_e = document.getElementsByClassName("buy");
var current = 0;
var section = document.getElementsByClassName("section");

function to(n){
    section[current].classList.add("sumir-section");


    setTimeout(dissapear, 500, current, n)
}
function dissapear(current_div, n_div){

    section[current_div].classList.add("display_none");

    if(current_div != 0){
        displays[current_div-1].classList.remove("show-display");
        item_shops[current_div-1].classList.remove("mini-shop");
        buttons_buy_e[current_div-1].value = "xxxx";
    }
    
    setTimeout(appear_session, 100, current_div, n_div)
}
function appear_session(current_div, n_div){

    section[n_div].classList.remove("display_none");

    setTimeout(finish_appear, 100, current_div, n_div)
}
function finish_appear(current_div, n_div){

    section[n_div].classList.remove("sumir-section");
    current = n_div;
}

function show_item(store_type, item){
    displays[store_type].classList.add("show-display");
    item_shops[store_type].classList.add("mini-shop");

    var item_price = item+"p";
    var price_ = document.getElementById(item_price).innerHTML;
    var img = document.getElementById(item);
   
    img_display[store_type].style.backgroundImage = img.style.backgroundImage;
    price_displays[store_type].innerHTML = price_;

    buttons_buy_e[store_type].value = item;
}