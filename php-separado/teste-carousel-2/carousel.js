var pgs = document.getElementsByClassName('pg')

var pages = [];

var am = 0;

for(var z = 0; z < pgs.length; z++){
    pages.push(z);
}

function org(n){
    am = 0;
    orgPages(n);

}
function generate(){

        var number_to_appear = 4;
        var starter_width = 300;
        var starter_bottom = -100;
        var starter_bottom_changer = 0;
        var starter_bottom_upper = 50;
        var starter_bottom_changer_changer = (starter_bottom_upper/(number_to_appear-1));
        var starter_z_index = pgs.length;
        var starter_white = 255;
        var starter_left = 100;
        var starter_left_changer = 30;

        function changeVs(i){

            if( pgs[pages[i]].classList.contains("off-screen-ani")){
                

                    pgs[pages[i]].classList.remove("off-screen-ani");
                    pgs[pages[i]].classList.add("back")
                
            }

            pgs[pages[i]].style.width = starter_width + "px";
            pgs[pages[i]].style.transform = 'translateY('+starter_bottom+'px)';
            pgs[pages[i]].style.backgroundColor = "rgb("+starter_white+","+starter_white+","+starter_white+")";

            pgs[pages[i]].style.zIndex = starter_z_index;

            pgs[pages[i]].style.left = starter_left + 'px';

            starter_width -= 10;
            starter_bottom += (starter_bottom_upper - starter_bottom_changer);
            starter_z_index -= 1;
            starter_white -= 25;
            starter_bottom_changer += starter_bottom_changer_changer;
            starter_left += starter_left_changer;

       
                pgs[i].classList.remove("back");

        }

        for(var i = 0; i < pgs.length; i++){
            changeVs(i);
        }

   
}

function orgPages(num){
    var t = pages.indexOf(num)

    for(var i = 0; i < t; i++){

        pgs[pages[0]].classList.add("off-screen-ani");

        pages.push(pages[0]);

        pages.shift();

        setTimeout(generate, 1000);

        am++;
        
    }
}
org(0)