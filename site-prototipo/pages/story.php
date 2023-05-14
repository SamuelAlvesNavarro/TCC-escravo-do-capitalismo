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
        $story = "SELECT * from story where id_story = $id_story";
        foreach ($pdo->query($story) as $key => $value) {
            $titulo = $value['nome'];
            $rating = $value['rating'];
        }
    }else{
        header("Location: error.php");
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

    $i = 0;
    $answers = array();
    $answer = "SELECT * FROM answer WHERE fk_id_question = '$id_question'";
    foreach($pdo->query($answer) as $key => $value){
        $answers[$i] = $value['text'];
        $numbers[$i] = $value['status'];
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
    <link rel="stylesheet" href="../css/story.css?v=1.01">
</head>
<body>
    <div class="all transi" id="all">
        <div id="sideBar" class="sideBar">
            <div class="container">
                <div id="goBack" onclick="putUp(-1)" class="goBack pointer">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
                <div style = "right: 0;" id="goFoward" onclick="putUp(1)" class="goFoward pointer">
                    <i class="fa-solid fa-arrow-right"></i>
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
                                        echo "<pre style='font-family: 'Indie Flower''>".$value["texto"]."</pre>";
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
                ?>
                <?php 
                    if($showQuestion == "flex;"){
                        echo '<div class="unanswered">
                            <div class="question-container">
                                <div class="question">
                                    <!-- aqui tem que vir a pergunta -->
                                    A pergunta é: <?php echo $questionText; ?>
                                </div>
                                <form id="question-form" method="post">
                                    <div class="options">
                                        <div class="col1-op op-col">
                                            <div class="option" onclick="answerForm('.$numbers[0].')">
                                                '.$answers[0].'
                                            </div>
                                            <div class="option" onclick="answerForm('.$numbers[1].')">
                                                '.$answers[1].'
                                            </div>
                                        </div>
                                        <div class="col2-op op-col">
                                            <div class="option" onclick="answerForm('.$numbers[2].')">
                                                '.$answers[2].'
                                            </div>
                                            <div class="option" onclick="answerForm('.$numbers[3].')">
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

                var question_form = document.getElementById("question-form");
                newInput1 = document.createElement("input");
                newInput1.type = "hidden";
                newInput1.name = "number";
                newInput1.value = n;
                question_form.appendChild(newInput1);
                question_form.submit();

                if(n == 0){
                    question_form.action = "erro.php";
                    question_form.submit();
                }else{
                    question_form.action = "acerto.php";
                    question_form.submit();
                }
            } ';
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
</html>