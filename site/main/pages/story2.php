<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/values.php";
    require "includes/enviarErro.php";

    function RetornarIdPage($id_story, $type){
        global $pdo;
        $page = "SELECT id_page from page where fk_id_story = $id_story and type = $type";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
            return $id_page;
        }
    }
    if(isset($_GET['input_1'])){
        $id_story = $_GET['input_1'];

        $_SESSION['id_story'] = $id_story;
        $story = "SELECT * from story where id_story = $id_story and status = 3";
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        if($prepare->rowCount() == 0) sendToError(14);

        foreach ($pdo->query($story) as $key => $value) {

                $titulo = $value['nome'];
                $rating = $value['rating'];
        }
    }else{
        sendToError(14);
        exit;
    }


    if(isset($_SESSION['story'])){
        $n_type = $_SESSION['story'];
    }

    $showAnswered = 0;
    $showQuestion = 0;
    $showRight = "none;";
    $showWrong = "none;";
    $showNo = "none;";

    /* QUESTION */

    $question = "SELECT * FROM question WHERE fk_id_story = '$id_story'";
    foreach($pdo->query($question) as $key => $value){
        $questionText = $value['quest_itself'];
        $id_question = $value['id_question'];
    }

    /* CHECK QUESTION TO SHOW */

    $email = $_SESSION['email'];
    $perfil = -1;
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }

    $check = "SELECT * FROM question_user WHERE fk_id_profile = $perfil and fk_id_question = $id_question";
    $prepare = $pdo->prepare($check);
    $prepare->execute();

    if($prepare->rowCount() > 0){

        $showRight = "block;";

    }else{

        /* CHECK ERROR */

        $check = "SELECT * FROM error_user WHERE fk_id_profile = $perfil and fk_id_story = $id_story";
        $prepare = $pdo->prepare($check);
        $prepare->execute();

        if($prepare->rowCount() > 0){
            $showWrong = "block;";
        }

    }

    if($showWrong == "block;" || $showRight == "block;") $showNo = "none;";
    else $showNo = "block;";
    
    /* SCORE STUFF */

    $check = "SELECT * FROM score WHERE fk_id_profile = $perfil and fk_id_story = $id_story";
    $prepare = $pdo->prepare($check);
    $prepare->execute();

    if($prepare->rowCount() == 0){
        $showQuestion = "flex;";
        $showAnswered = "none;";
    }else{
        $showQuestion = "none;";
        $showAnswered = "block;";
    }

    /* ANSWERS */

    $r = (rand(0,10));
    $sure = (rand(0,10));
    $i = 0;
    $answers = array();
    $answer = "SELECT * FROM answer WHERE fk_id_question = '$id_question'";
    foreach($pdo->query($answer) as $key => $value){
        $answers[$i] = $value['text'];

        $numbers[$i] = $value['status'];

        if($numbers[$i] != 1){

            $numbers[$i] = (rand(0,10));

            if($numbers[$i] == $r) $numbers[$i]++;

        }else{
            $numbers[$i] = $r;
        }
        
        $i++;
    }
?>
<!DOCTYPE html>
<html lang="pt-br" class="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/story2.css?v=1.01">
    <link rel="stylesheet" href="../css/scroll.css?v=1.01">
    <title>História</title>
</head>
<body>
    <div class="all">
        <section class="controls">
            <div class="progressBar">
                <div class="bar">
                    <div class="filled">

                    </div>
                </div>
            </div>
        </section>
        <section class="menu">

        </section>
        <section class="banner" id="banner">
            <div class="banner_in">
                <div class="mainTitle">
                    <h1><?php echo $titulo; ?></h1>
                    <h4 id="autor">por: 
                        <span class="un">
                            <?php
                                $autor = "select user_common.nome as nome, user_common.fk_id_profile as cod from user_common, story where story.fk_id_profile = user_common.fk_id_profile and story.id_story = $id_story";
                                foreach ($pdo->query($autor) as $key => $value) {
                                    echo '<a href="profile.php?profile='.$value['cod'].'">'.$value['nome'].'</a>';
                                }
                            ?>
                        </span>
                    </h4>
                    <h3 id="subTitle">História</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                    </svg>
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
            </div>
        </section>
        <section class="page">
            <div class="line-page" id="content-page">
                <div class="pg history">
                    <?php
                        $id_page = RetornarIdPage($id_story, 0);
                        $sql = "select texto from history where fk_id_page='$id_page'";
                        foreach ($pdo->query($sql) as $key => $value) {
                            $text = stripslashes($value["texto"]);
                            echo "<pre>".$text."</pre>";
                        }
                    ?>
                </div>
                <div class="pg images">

                </div>
                <div class="pg refs">

                </div>
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

        var bn = document.getElementById('banner');

        function getBloody(){
            bn.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
        }

        getBloody();


        /* REFER CONTROL */

        var nS = 1;

        var changePos = document.getElementsByClassName("pageRefer");

        var subTitle = document.getElementById("subTitle");

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

                    subTitle.innerHTML = "Referências";
                }
                else if(n == 1){
                    changePos[0].style.order = 1;
                    changePos[2].style.order = 3;

                    subTitle.innerHTML = "História";
                }
                else if(n == 2){
                    changePos[0].style.order = 3;
                    changePos[1].style.order = 1;

                    subTitle.innerHTML = "Imagens";
                }

                for(var i  = 0; i < changePos.length; i++){
                    if(i != n){
                        changePos[i].classList.remove("superRefer");
                    }
                }
            }
        }

        /* SCROLL ANIS*/

        window.addEventListener("scroll", reveal);

        function reveal(){

            var reveal = document.getElementById('content-page');
            var underlines = document.getElementsByClassName("un");

            var windowH = window.innerHeight;
            var revealtop = reveal.getBoundingClientRect().top;
            var revealbottom = reveal.getBoundingClientRect().bottom;
            var revealpoint = 100;

            if(revealtop < windowH - revealpoint){
                reveal.classList.add('active');
                bn.classList.add("modest");
            }else{
                reveal.classList.remove('active');
                bn.classList.remove("modest");
            }

            console.log(revealbottom - (windowH + revealpoint));

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
    </script>
</body>
</html>