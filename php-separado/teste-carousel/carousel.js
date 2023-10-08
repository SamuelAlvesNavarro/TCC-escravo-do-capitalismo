var pgs = document.getElementsByClassName('pg')

var pages = [];

for(var z = 0; z < pgs.length; z++){
    pages.push(z);
}
function orgPages(num){
    var t = pages.indexOf(num)

    for(var i = 0; i < t; i++){

        pgs[pages[0]].classList.add("off-screen-ani");

        pages.push(pages[0]);

        pages.shift();
        
    }
}
function generate(num){

    orgPages(num);

    setTimeout( () => {

        var number_to_appear = 6;
        var starter_width = 700;
        var starter_bottom = -100;
        var starter_bottom_changer = 0;
        var starter_bottom_upper = 25;
        var starter_bottom_changer_changer = (starter_bottom_upper/(number_to_appear-1));
        var starter_z_index = pgs.length;
        var starter_white = 255;

        function changeVs(i){

            if( pgs[pages[i]].classList.contains("off-screen-ani")){
                
                setTimeout( () => {

                    pgs[pages[i]].classList.remove("off-screen-ani");
                    pgs[pages[i]].classList.add("back")
                
                }, 400);
            }

            pgs[pages[i]].style.width = starter_width + "px";
            pgs[pages[i]].style.bottom = starter_bottom + "px";
            pgs[pages[i]].style.backgroundColor = "rgb("+starter_white+","+starter_white+","+starter_white+")";

            pgs[pages[i]].style.zIndex = starter_z_index;

            starter_width -= 50;
            starter_bottom += (starter_bottom_upper - starter_bottom_changer);
            starter_z_index -= 1;
            starter_white -= 30;
            starter_bottom_changer += starter_bottom_changer_changer;

            setTimeout( () => 
            {
                pgs[i].classList.remove("back");

            }, 450)
        }

        for(var i = 0; i < pgs.length; i++){
            changeVs(i);
        }

    } , 100)
}

generate(0)