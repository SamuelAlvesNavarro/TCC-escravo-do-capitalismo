<?php
    require "includes/conexao.php";
    require "includes/online.php";

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
        $story = "SELECT * from story where id_story = $id_story and status = 3";
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        if($prepare->rowCount() == 0)header("Location: error.php");

        foreach ($pdo->query($story) as $key => $value) {

            
                $titulo = $value['nome'];
                $rating = $value['rating'];
        }
    }else{
        header("Location: error.php?erro=14");
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>História</title>
    <link rel="stylesheet" href="../css/menu.css?v=1.01">
    <link rel="stylesheet" href="../css/story.css?v=1.01">
    <link rel="stylesheet" href="../css/notification.css">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
</head>
<body>
    <div id="all-menu" class="all_menu disappear">
            <div id="chevron-menu" class="close-menu chevron-phases" onclick="menu_appear()">
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </div>
            <div id="menu" class="menu off">
                <div class="lamp">
                    <div class="wire">
                        
                    </div>
                    <i onclick="switchMenu(1)" class="fa-solid fa-lightbulb"></i>
                </div>
                <div class="lamp-area" onclick="switchMenu(2)">
                </div> 
                <div class="content">
                    <ul>
                        <li><a href="central.php" target="_blank" rel="noopener noreferrer">Central</a></li>
                        <li><a href="profile.php?profile=<?php echo $perfil?>" target="_blank" rel="noopener noreferrer">Perfil</a></li>
                        <li><a href="loja.php" target="_blank" rel="noopener noreferrer">Loja</a></li>
                        <li><a href="criacao.php" target="_blank" rel="noopener noreferrer">Criação</a></li>
                        <div class="search">
                            <form action="pesquisa.php" method="get">
                                <div class="search-box">
                                    <button class="btn-search"><i class="fas fa-search"></i></button>
                                    <input required type="text" name="busca" class="input-search" placeholder="Pesquisar história........">
                                </div>
                            </form>
                        </div>
                    </ul>
                    <!--<img src="https://clipart-library.com/images/rcLoyAzKi.png" alt="" srcset="">-->
                </div>
            </div>
        </div>
    </div>
    <div id="alertWr" class="alert hide">
        <span class="fa-solid fa-circle-xmark n_icon"></span>
        <span class="msg">Você errou: -25<i class='fa-solid fa-coins'></i></span>
        <div class="close-btn" onclick="callOutNotification(0)">
            <span class="fas fa-times"></span>
        </div>
    </div>
    <div id="alertRi" class="alert hide">
        <span class="fa-solid fa-check n_icon"></span>
        <span class="msg">Você acertou: +25<i class='fa-solid fa-coins'></i> +100<i class="fa-solid fa-book"></i></span>
        <div class="close-btn" onclick="callOutNotification(1)">
            <span class="fas fa-times"></span>
        </div>
    </div>
    <div class="all transi" id="all">
        <div id="sideBar" class="sideBar">
            <div class="container">
                <div id="goBack" onclick="putUp(-1)" class="goBack pointer">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div style = "right: 0;" id="goFoward" onclick="putUp(1)" class="goFoward pointer">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div id="slider" class="story-all-container slider">
            <div class="page slide">
                <div class="history">
                    <div class="writing">
                        <div id="title-container" class="story-title-container">
                            <div class="story-title transi">
                                <h1 class="transi">
                                    <?php
                                        echo $titulo;
                                    ?>
                                </h1>
                            </div>
                            <div onclick = "checkStuff(0)" class="bt-open-close">
                                <div class="bt">
                                    <i style="font-size: 30px;" class="exp-min fa-solid fa-expand"></i>
                                </div>
                            </div>
                            <div class="classif">
                                <div class="stars"> 
                                    <div class="ratings transi">
                                        <div class="empty-stars"></div>
                                        <div id="full-stars"></div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="lines">
                            <div class="text"> <!-- contenteditable -->
                                <?php
                                    $id_page = RetornarIdPage($id_story, 0);
                                    $sql = "select texto from history where fk_id_page='$id_page'";
                                    foreach ($pdo->query($sql) as $key => $value) {
                                        $text = stripslashes($value["texto"]);
                                        echo "<pre style='font-family: 'Indie Flower''>".$text."</pre>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $id_page = RetornarIdPage($id_story, 1);
            $sql = "SELECT path FROM images WHERE fk_id_page='$id_page'";

            $prepare = $pdo->prepare($sql);
            $prepare -> execute();

            if($prepare -> rowCount() > 0){
                echo '
                <div class="page slide">
                    <div>
                        <div class="writing images-page">
                            <div id="title-container" class="story-title-container">
                                <div class="story-title transi">
                                    <h1 class="transi">Imagens</h1>
                                </div>
                                <div onclick = "checkStuff(1)" class="bt-open-close">
                                    <div class="bt">
                                        <i style="font-size: 30px;" class="exp-min fa-solid fa-expand"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="images" spellcheck="false">';
                                    
                                    foreach ($pdo->query($sql) as $key => $value) {
                                        echo "<img src='". $value['path'] ."'><br><br>";
                                    }
                                echo 
                            '</div>
                        </div>
                    </div>
                </div>';
            }
            
                $id_page = RetornarIdPage($id_story, 2);
                $sql = "SELECT path FROM reference WHERE fk_id_page='$id_page'";
                $prepare = $pdo->prepare($sql);
                $prepare -> execute();

                if($prepare -> rowCount() > 0){
                    echo'
                        <div class="page slide">
                            <div>
                                <div class="writing reference-writing">
                                    <div id="title-container" class="story-title-container">
                                        <div class="story-title transi">
                                            <h1 class="transi">Referências</h1>
                                        </div>
                                        <div onclick = "checkStuff(2)" class="bt-open-close">
                                            <div class="bt">
                                                <i style="font-size: 30px;" class="exp-min fa-solid fa-expand"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lines">
                                        <div class="text" spellcheck="false"> ';
                    
                                        
                                        foreach ($pdo->query($sql) as $key => $value) {
                                            echo "<a href ='". $value['path'] ."'>". $value['path'] ."</a>";
                                        }
                                                
                                        echo' 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
        <div class="main">
            <div class="interaction-container">
                <?php 
                    if($showAnswered == "block;"){
                        echo 
                        '<div class="answered">
                            <h1>Você já respondeu essa pergunta! Obrigado pela avalicação!</h1>          
                        </div>';
                    }
                    if($showQuestion == "flex;"){
                        echo '<div class="unanswered">
                            <div class="question-container">
                                <div class="question">
                                   '.$questionText.'
                                </div>
                                <form id="question-form" method="post">
                                    <div class="options">
                                        <div class="col1-op op-col">
                                            <div class="option" onclick="answerForm(0)">
                                                '.$answers[0].'
                                            </div>
                                            <div class="option" onclick="answerForm(1)">
                                                '.$answers[1].'
                                            </div>
                                        </div>
                                        <div class="col2-op op-col">
                                            <div class="option" onclick="answerForm(2)">
                                                '.$answers[2].'
                                            </div>
                                            <div class="option" onclick="answerForm(3)">
                                                '.$answers[3].'
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_story" value="'.$id_story.'"><br>
                                        <input type="hidden" name="id_question" value="'.$id_question.'"><br>
                                    </div>
                                </form>
                            </div>  
                            <div class="rating-container">
                                <div id="noAnswer" class="noAnswer" style="display:'.$showNo.'">
                                    <div class="things-container-noAnswer">
                                        <div class="rating-part">
                                            <h1>Você ainda não respondeu à pergunta</h1>
                                        </div>
                                    </div>
                                </div>
                                <div id="right" class="right" style="display:'.$showRight.'">
                                    <div class="things-container" style="background-color: #1f4921;">
                                        <div class="rating-part">
                                            <h1>Você Acertou</h1>
                                        </div>
                                        <div class="rating-part rating-container-input">
                                            <form id="form-container" action="score.php" method="post">
                                                <input type="number" name="rating" id="rating-input" max="5" min="1" placeholder="Dê uma nota à história!"><br>
                                                <input type="hidden" name="id_story" value="'.$id_story.'"><br>
                                                <input type="hidden" name="id_question" value="'.$id_question.'"><br>
                                                <input type="submit" value="Enviar" id="rating-input-submit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="wrong" class="wrong" style="display:'.$showWrong.'">
                                    <div class="things-container" style="background-color: rgb(87, 17, 17);">
                                        <div class="rating-part">
                                            <h1>Você Errou</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
<script>
    <?php 
        if($showRight == "none;"){
            echo '
            function answerForm(n){

                var options = document.getElementsByClassName("option");
                var question_form = document.getElementById("question-form");
                newInput1 = document.createElement("input");
                newInput1.type = "hidden";
                newInput1.name = "number";
                newInput1.value = options[n].innerText;
                question_form.appendChild(newInput1);


                question_form.action = "resposta.php";
                question_form.submit();

                
            } ';
        }
        if(isset($_SESSION['story']) && $_SESSION['story'] != -1){
            echo '
            var alerts = document.getElementsByClassName("alert");

            function callNotification(n){
                alerts[n].classList.remove("hide");
                alerts[n].classList.add("showAlert");
                alerts[n].classList.add("show");
            } 
            function callOutNotification(w){
                alerts[w].classList.remove("show");
                alerts[w].classList.add("hide");
            }

            callNotification('.$n_type.')
            ';
            $_SESSION['story'] = -1;
        }
    ?>

        var stars = document.getElementById("full-stars")

        var qP = <?php echo $rating ?>;

        stars.style.width = calcStar(qP) + "%";     
        
        function calcStar(points){
            return (100*points)/5;
        }
    
</script>
<script src="../js/story.js?v=1.01"></script>
<script src="../js/menu.js?v=1.01"></script>
</html>