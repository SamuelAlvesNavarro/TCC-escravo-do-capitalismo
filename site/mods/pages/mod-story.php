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
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        if($prepare->rowCount() == 0)header("Location: error.php");

        foreach ($pdo->query($story) as $key => $value) {

            
                $titulo = $value['nome'];
                $rating = $value['rating'];
        }
    }

    if(isset($_SESSION['story'])){
        $n_type = $_SESSION['story'];
    }

    $showAnswered = 0;
    $showRight = "none;";
    $showWrong = "none;";
    $showNo = "none;";

    /* QUESTION */

    $question = "SELECT * FROM question WHERE fk_id_story = '$id_story'";
    foreach($pdo->query($question) as $key => $value){
        $questionText = $value['quest_itself'];
        $id_question = $value['id_question'];
    }

    if($prepare->rowCount() > 0){

        $showRight = "block;";

    }else{

        if($prepare->rowCount() > 0){
            $showWrong = "block;";
        }

    }

    if($showWrong == "block;" || $showRight == "block;") $showNo = "none;";
    else $showNo = "block;";
    

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


    /* QUARENTENA */
    echo '
        <form method="post" action="programaticos/quarentena.php">
            <input type="hidden" name="id_story" value="'.$id_story.'"><br>
            <button>Quarentena</button>
        </form>
    ';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>História</title>
    <link rel="stylesheet" href="../css/story.css">
</head>
<body>
    <?php
        require "includes/menu.php";
    ?>
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
                                        echo "<img src='../../main/pages/". $value['path'] ."'><br><br>";
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
                        echo '<div class="unanswered">
                            <div class="question-container">
                                <div class="question">
                                   '.$questionText.'
                                </div>
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
                                    </div>
                            </div>  
                        </div>';
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
<script src="../js/story.js"></script>
</html>