<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/story2.css">
    <title>História</title>
</head>
<body>
    <div class="all">
        <section class="menu">

        </section>
        <section class="banner" id="banner">
            <div class="mainTitle">
                <h1>Título</h1>
            </div>
            <div class="pageRefer_container">
                <div class="pageRefer" onclick="changePosN(0)">
                    0
                </div>
                <div class="pageRefer superRefer" onclick="changePosN(1)">
                    1
                </div>
                <div class="pageRefer" onclick="changePosN(2)">
                    2
                </div>
            </div>
        </section>
        <section class="page">
            <div class="line-page">

            </div>
        </section>
        <section class="quest">

        </section>
        <section class="comment">

        </section>
    </div>
    <script>
        function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}

        var all = document.getElementById('banner');

        function getBloody(){
            all.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
        }

        getBloody();


        /* REFER CONTROL */

        var nS = 1;

        var changePos = document.getElementsByClassName("pageRefer");

        function toLast(){
            if(nS != 0) changePosN(nS - 1);
            else changePosN(changePos.length - 1)
        }
        function toNext(){
            if(nS != changePos.length - 1) changePosN(nS + 1);
            else changePosN(0)
        }

        

        function changePosN(n){
            if(changePos.length == 2){

            }else{

                changePos[n].style.order = 2;
                changePos[n].classList.add("superRefer");

                nS = n;

                if(n == 0){
                    changePos[1].style.order = 3;
                    changePos[2].style.order = 1;
                }
                else if(n == 1){
                    changePos[0].style.order = 1;
                    changePos[2].style.order = 3;
                }
                else if(n == 2){
                    changePos[0].style.order = 3;
                    changePos[1].style.order = 1;
                }

                for(var i  = 0; i < changePos.length; i++){
                    if(i != n){
                        changePos[i].classList.remove("superRefer");
                    }
                }
            }
        }
    </script>
</body>
</html>