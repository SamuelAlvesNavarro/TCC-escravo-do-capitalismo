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
    if(isset($_GET['story'])){
        $id_story = $_GET['story'];

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
    
    if($showRight == "block;" || $showWrong == "block;") $showQuestion = "none";
    else{
        $showQuestion = "block;";
    }
    /* SCORE STUFF */

    $check = "SELECT * FROM score WHERE fk_id_profile = $perfil and fk_id_story = $id_story";
    $prepare = $pdo->prepare($check);
    $prepare->execute();

    if($prepare->rowCount() == 0){
        $showAnswered = "none;";
    }else{
        $showAnswered = "block;";
        $showRight = "none;";
        $showWrong = "none;";
        $showQuestion = "none;";
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
    <link rel="stylesheet" href="../css/menu.css?v=1.01">
    <link rel="stylesheet" href="../css/story.css?v=1.01<?php echo rand(0,10000)?>">
    <link rel="stylesheet" href="../css/scroll.css?v=1.01">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <title>História</title>
</head>
<body>
    <?php
        include "includes/menu.php";
    ?>
    <div class="report_comment_modal" id="report_comment_modal">
        <div class="close-rep" onclick="rep(0)">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="report_comment_container">
            <form action="report_comment" method="post">
                <h1>Escreva sua Denúncia</h1>
                <input type="hidden" name="id_comment" id="rep_c">
                <textarea name="reason" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Denunciar">
            </form>
        </div>
    </div>
    <div class="all">
        <section class="controls-sec" id="contr">
            <div class="progressBar">
                <div class="bar">
                    <div class="filled" id="filled">

                    </div>
                </div>
            </div>
            <i class="fa-solid fa-sun mode"></i>
        </section>
        <section class="menuH">
            <div class="el-container">
                <div class="controls">
                    <div class="back-to-central-bt">
                        <a href="central.php">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                    <div class="back-to-central-bt" onclick="menu_appear()">
                        <i class="fa-solid fa-bars"></i>
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
                <div class="logo">
                    <div class="logo-pic">
                        <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
                    </div>
                </div>
            </div>
        </section>
        <?php

            $id_page = RetornarIdPage($id_story, 1);
            $sql = "SELECT path FROM images WHERE fk_id_page='$id_page' and fundo = 1";

            $prepare = $pdo->prepare($sql);
            $prepare -> execute();

            if($prepare -> rowCount() > 0){
                foreach ($pdo->query($sql) as $key => $value) {
                    $banner_path = "background-image: url(".$value['path'].")";
                    break;
                }
            }else{
                $banner_path = 'background-image: url(../img/kid-spider.jpg)';
            }
        ?>
        <section class="banner" id="banner" style="<?php echo $banner_path ?>">
            <div class="banner_in">
                <div class="mainTitle">
                    <h1><?php echo $titulo; ?></h1>
                    <h4 id="autor">por: 
                        <span class="un" >
                            <?php
                                $autor = "select user_common.nome as nome, user_common.fk_id_profile as cod from user_common, story where story.fk_id_profile = user_common.fk_id_profile and story.id_story = $id_story";
                                foreach ($pdo->query($autor) as $key => $value) {
                                    echo '<a href="profile.php?profile='.$value['cod'].'" style="color: white !important;">'.$value['nome'].'</a>';
                                }
                            ?>
                        </span>
                    </h4>
                    <h3 id="subTitle"><?php echo $titulo; ?></h3>
                    <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                        <path style="color: white;" fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                    </svg>
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
                <div class="pg refs">
                    <h1>Referências</h1>
                    <?php
                        $id_page = RetornarIdPage($id_story, 2);
                        $ref = "SELECT path FROM reference WHERE fk_id_page='$id_page'";
                        $prepare = $pdo->prepare($ref);
                        $prepare -> execute();

                        if($prepare -> rowCount() > 0){
                            foreach ($pdo->query($ref) as $key => $value) {
                                echo "→ <a href ='". $value['path'] ."'>". $value['path'] ."</a><br>";
                            }          
                        }
                    ?>
                </div>
                        <?php

                            $id_page = RetornarIdPage($id_story, 1);
                            $sql = "SELECT path FROM images WHERE fk_id_page='$id_page'";

                            $prepare = $pdo->prepare($sql);
                            $prepare -> execute();

                            if($prepare -> rowCount() > 0): ?>

                
                                <div class="pg images">
                                    <h1>Imagens</h1>
                                    <div class="cont-img">
            
                                    <?php foreach ($pdo->query($sql) as $key => $value): ?>
                                        
                                        <img src="<?php echo $value['path'] ?>">

                                    <?php endforeach; ?>
                                    
                                    </div>
                                </div>
                        
                            <?php endif; ?>
                            
            </div>
        </section>
        <section class="quest" id="quest_item">
            <div class="quest-cont">

                <?php if($showAnswered == "block;"): ?>
                    <div class="answered">
                        <h1>Você já respondeu essa pergunta! Obrigado por sua avalicação!</h1>          
                    </div>
                <?php endif; ?>
                <?php if($showQuestion == "block;"): ?>

                    <div class="unanswered">
                        <div class="question-container">
                            <div class="question">
                                <?php echo $questionText; ?>
                            </div>
                            <form id="question-form" method="post">
                                <div class="options">
                                    <div class="option" onclick="answerForm(0)">
                                        <div class="op-lel">A</div><div class="text_op"><?php echo $answers[0]; ?></div>
                                    </div>
                                    <div class="option" onclick="answerForm(1)">
                                        <div class="op-lel">B</div><div class="text_op"><?php echo $answers[1]; ?></div>
                                    </div>
                                    <div class="option" onclick="answerForm(2)">
                                        <div class="op-lel">C</div><div class="text_op"><?php echo $answers[2]; ?></div>
                                    </div>
                                    <div class="option" onclick="answerForm(3)">
                                        <div class="op-lel">D</div><div class="text_op"><?php echo $answers[3]; ?></div>
                                    </div>
                                    <input type="hidden" name="id_story" value="<?php echo $id_story; ?>"><br>
                                    <input type="hidden" name="id_question" value="<?php echo $id_question; ?>"><br>
                                </div>
                            </form>
                        </div>  
                    </div>
                
                <?php endif; ?>

                <?php if($showWrong == "block;"): ?>

                    <div id="wrong" class="wrong" style="display:<?php echo $showWrong; ?>">
                        <h1>Você Errou!</h1>
                        <div class="bt-retry">
                            <form action="retry_exe.php" method="post">
                                <input type="hidden" name="__prof" value="<?php echo $id_question; ?>">
                                <input type="submit" value="Tentar Novamente">
                            </form>
                        </div>
                    </div>

                <?php endif; ?>

                <?php if($showRight == "block;"): ?>
                    
                    <div class="rating-container">
                        <div class="rating-part">
                            <h1>Você Acertou</h1>
                        </div>
                        <div class="rating-part rating-container-input">
                            <form id="form-container" action="score.php" method="post">
                                <input type="number" required name="rating" id="rating-input" max="5" min="1" placeholder="Dê uma nota à história!"><br>
                                <input type="hidden" name="id_story" value="<?php echo $id_story; ?>">
                                <input type="hidden" name="id_question" value="<?php echo $id_question; ?>">
                                <input type="submit" value="Enviar" id="rating-input-submit">
                            </form>
                        </div>
                    </div>

                <?php endif; ?>
                
            </div>
        </section>

        <?php

            if($showAnswered == "block;"){
            
                echo '<section class="comments" id="comments">

                <h1>Comentários</h1>

                <form action="comment.php" method="post">
                    <textarea required type="text" name="comment-text" maxlength="512" placeholder="Escreva aqui seu comentário"></textarea>
                    <input type="submit" value="Comentar">
                </form>
                
                ';

                $sql = 
                
                "
                
                select comment.*, user_common.apelido as nome, profile.id_profile as cod, gadget.in_it as foto
                
                from comment, profile, user_common, gadget 
                    
                where 

                comment.fk_id_profile = profile.id_profile and
                user_common.fk_id_profile = comment.fk_id_profile and 
                gadget.id_gadget = profile.foto and
                gadget.type = 0 and
                comment.fk_id_story = $id_story 
                
                order by comment.id_comment asc
                
                ";

                $prepare = $pdo->prepare($sql);
                $prepare->execute();
    
                echo '
                    <div class="comments-container">
                        ';
                        
                        if($prepare->rowCount() != 0){
                            
                            foreach ($pdo->query($sql) as $key => $value) {

                                if($value['cod'] == $perfil){
                                    $class = "mine";
                                    $classC = "mineC";
                                    $classA = "mineA";
                                    $del = '<a href="excluir_comment?id_comment='.$value['id_comment'].'"><i class="fa-solid fa-trash"></i></a>';
                                }else{
                                    $class = "regular";
                                    $classC = "";
                                    $classA = "";
                                    $del = '<a onclick="rep('.$value['id_comment'].')"><i class="fa-solid fa-exclamation"></i></a>';
                                }

                                echo' <div class="comment-container '.$class.'">
                                        <div class="arrow '.$classA.'"></div>
                                        <div class="comment '.$classC.'">
                                        <div class="cheader">
                                                <div class="row-c">
                                                    <div class="pic" style="'.$value['foto'].'">

                                                    </div>
                                                    <div class="name">
                                                        <a href="profile.php?profile='.$value['cod'].'">'.$value['nome'].'</a>
                                                    </div>
                                                </div>
                                                <div class="cntr">
                                                    '.$del.'
                                                </div>
                                            </div>
                                            <div class="content-comment">
                                                '.$value['text'].'
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }

                        echo '
                    
                    </div>';

            }
            
            echo '</section>';

        ?>
    </div>
    <script>
        var style = document.querySelector('.quest').style;
        
        /* QUESTION */
        <?php
            if($showQuestion == "block;"){
                echo '
                function answerForm(n){

                    var options = document.getElementsByClassName("text_op");
                    var question_form = document.getElementById("question-form");
                    newInput1 = document.createElement("input");
                    newInput1.type = "hidden";
                    newInput1.name = "number";
                    newInput1.value = options[n].innerText;
                    question_form.appendChild(newInput1);


                    question_form.action = "resposta.php";
                    question_form.submit();

                    
                } ';

                echo '
                    style.setProperty("--background", "linear-gradient(0deg, rgba(46, 46, 46, 0.808), rgba(46, 46, 46, 0.808))"); 
                ';
            }


            if($showRight == "block;"){
                echo '
                    style.setProperty("--background", "rgba(8, 131, 14, .7)");
                ';
            }

            if($showWrong == "block;"){
                echo '
                    style.setProperty("--background", "rgba(148, 8, 8, 0.815)");
                ';
            }

            if($showAnswered == "block;"){
                echo '
                    document.getElementById("quest_item").style.display = "none";
                ';
            }
        ?>


var stars = document.getElementById("full-stars")

        var qP = <?php echo $rating ?>;

        stars.style.width = calcStar(qP) + "%";     
        
        function calcStar(points){
            return (100*points)/5;
        }

    </script>
    <script src="../js/story.js?v=1.03124"></script>
    <script src="../js/menu.js"></script>
</body>
</html>