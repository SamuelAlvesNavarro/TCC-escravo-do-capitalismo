<?php
    require "includes/conexao.php";
    require "includes/online.php";
    require "includes/values.php";
    require "includes/enviarErro.php";

    $email = $_SESSION['email'];
    $perfil = -1;
    $sql = "SELECT fk_id_profile FROM user_common WHERE email = '$email'";
    foreach($pdo->query($sql) as $key => $value){
        $perfil = $value['fk_id_profile'];
    }

    function RetornarIdPage($id_story, $type){
        global $pdo;
        $page = "SELECT id_page from page where fk_id_story = $id_story and type = $type";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
            return $id_page;
        }
    }
    if(isset($_POST['story'])){
        $id_story = $_POST['story'];

        $_SESSION['id_story'] = $id_story;
        $story = "SELECT * from story where id_story = $id_story and fk_id_profile = $perfil and status = 2";
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        if($prepare->rowCount() == 0){
            sendToError(18);
            exit;
        }

        foreach ($pdo->query($story) as $key => $value) {

            $titulo = $value['nome'];

            $perfil_dono = $value['fk_id_profile'];
        }

    }else{
        sendToError(23);
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

    /* ANSWERS */

    $r = (rand(0,10));
    $sure = (rand(0,10));
    $i = 0;
    $answers = array();
    $answer = "SELECT * FROM answer WHERE fk_id_question = '$id_question'";
    foreach($pdo->query($answer) as $key => $value){
        $answers[$i] = $value['text'];

        $numbers[$i] = $value['status'];

        if($numbers[$i] == 1){
            $class_awe[$i] = "right-answer";
        }else{
            $class_awe[$i] = "wrong-answer";
        }

        $i++;
    }

     /* PEGANDO LINKS */

     $paths = array();

     $id_page = RetornarIdPage($id_story, 1);
     $sql = "SELECT path FROM images WHERE fk_id_page='$id_page'";
 
     $prepare = $pdo->prepare($sql);
     $prepare -> execute();
 
     if($prepare -> rowCount() > 0){
         foreach ($pdo->query($sql) as $key => $value){
             array_push($paths, $value['path']);
         }
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
    <link rel="stylesheet" href="../css/aprovacao.css?v=1.01<?php echo rand(0,10000)?>">
    <link rel="stylesheet" href="../css/scroll.css?v=1.01">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <title>História</title>
</head>
<body>
    <?php
        require "includes/loading.php";
    ?>
    <?php
        include "includes/menu.php";
    ?>
    <div class="all">
        <section class="controls-sec" id="contr">
            <div class="progressBar">
                <div class="bar">
                    <div class="filled" id="filled">

                    </div>
                </div>
            </div>
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
                <div class="navBottom">
            <div class="go-menu-bt check-bt" onclick="aceitar(<?php echo $id_story;?>)">
                <i class="fa-solid fa-check"></i>
            </div>
            <div class="go-menu-bt xmark-bt" onclick="rejeitar(<?php echo $id_story;?>)">
                <i class="fa-solid fa-xmark"></i>
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
                $banner_path = 'background-image: url(../img/general-bc.jpg)';
            }
        ?>
        <section class="banner" id="banner" style="<?php echo $banner_path ?>">
            <div class="banner_in">
                <div class="mainTitle">
                    <h1><?php echo $titulo; ?></h1>
                    <?php
                        if($perfil_dono != 666):
                    ?>
                    <h4 id="autor">por: 
                        <span class="un" >
                            <?php
                                $autor = "select user_common.nome as nome, user_common.fk_id_profile as cod from user_common, story where story.fk_id_profile = user_common.fk_id_profile and story.id_story = $id_story";
                                foreach ($pdo->query($autor) as $key => $value) {
                                    echo '<a href="profile.php?profile='.$value['cod'].'">'.$value['nome'].'</a>';
                                }
                            ?>
                        </span>
                    </h4>
                    <?php endif; ?>
                    <h3 id="subTitle"><?php echo $titulo; ?></h3>
                    <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
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
                            $text = str_replace("<u>", "<span class='un'>", $text);
                            $text = str_replace("</u>", "</span>", $text);

                            for($t = 0; $t < 10; $t++){
                                if(!isset($paths[$t]))break;
                                $text = str_replace("<img".($t+1).">", "<img src=".$paths[$t].">", $text);
                            }

                            echo "<pre>".$text."</pre>";

                        }
                        
                        
                    ?>
                </div>
                <div class="pg refs">
                    <div class="hr_div">
                        <hr>
                    </div>
                    <div class="text">
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
                </div>
            </div>
        </section>
        <section class="quest" id="quest_item">
            <div class="quest-cont">

                    <div class="unanswered">
                        <div class="question-container">
                            <div class="question">
                                <?php echo $questionText; ?>
                            </div>
                            <form id="question-form" method="post">
                                <div class="options">
                                    <div class="option">
                                        <div class="op-lel <?php echo $class_awe[0]; ?>">A</div><div class="text_op"><?php echo $answers[0]; ?></div>
                                    </div>
                                    <div class="option">
                                        <div class="op-lel <?php echo $class_awe[1]; ?>">B</div><div class="text_op"><?php echo $answers[1]; ?></div>
                                    </div>
                                    <div class="option">
                                        <div class="op-lel <?php echo $class_awe[2]; ?>">C</div><div class="text_op"><?php echo $answers[2]; ?></div>
                                    </div>
                                    <div class="option">
                                        <div class="op-lel <?php echo $class_awe[3]; ?>">D</div><div class="text_op"><?php echo $answers[3]; ?></div>
                                    </div>
                                    <input type="hidden" name="id_story" value="<?php echo $id_story; ?>"><br>
                                    <input type="hidden" name="id_question" value="<?php echo $id_question; ?>"><br>
                                </div>
                            </form>
                        </div>  
                    </div>    
            </div>
        </section>
    </div>
    <script src="../js/aprovacao.js?v=1.031242"></script>
    <script src="../js/menu.js"></script>


    <div id="hidden_form_container" style="display:none;"></div>

    <?php
    
        include "includes/footer.php";
        
    ?>
</body>
</html>