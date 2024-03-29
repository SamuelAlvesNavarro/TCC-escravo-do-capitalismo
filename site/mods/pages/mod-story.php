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
    if(isset($_GET['story'])){
        $id_story = $_GET['story'];

        $_SESSION['id_story'] = $id_story;
        $story = "SELECT * from story where id_story = $id_story and status = 3";
        $prepare = $pdo->prepare($story);
        $prepare->execute();
        
        if($prepare -> rowCount() == 0){
            header("Location:esgotos.php");
            exit;
        }


        foreach ($pdo->query($story) as $key => $value) {

            $titulo = $value['nome'];
            $rating = $value['rating'];
            $perfil_dono = $value['fk_id_profile'];
        }
    }

    if(isset($_SESSION['story'])){
        $n_type = $_SESSION['story'];
    }

    $showAnswered = "block";
    $showQuestion = "block;";

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

        if($numbers[$i] != 1){

            $numbers[$i] = (rand(0,10));

            if($numbers[$i] == $r) $numbers[$i]++;

        }else{
            $numbers[$i] = $r;
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



    $sql = "select count(*) as num from comment where fk_id_story = $id_story";

    foreach ($pdo->query($sql) as $key => $value){
        $amount = $value['num'];
    }
    
    
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
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/story.css?v=1.01<?php echo rand(0,10000)?>">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <title>História</title>
</head>
<body>

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
                    <div class="back-to-central-bt" style="margin-top:30px;">
                        <a href="esgotos.php">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                    </div>
                    <form method="post" action="programaticos/quarentena.php">
                        <input type="hidden" name="id_story" value="<?php echo $id_story; ?>"><br>
                        <button style="background-color: red; padding: 10px; cursor:pointer;">Quarentena</button>
                    </form>
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
                    $banner_path = "background-image: url(../../main/pages/".$value['path'].")";
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
                                    echo '<a href="user.php?profile='.$value['cod'].'">'.$value['nome'].'</a>';
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
                                $text = str_replace("<img".($t+1).">", "<img src=../../main/pages/".$paths[$t].">", $text);
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
                            <div class="question" id="quest">
                                <?php echo $questionText; ?>
                            </div>

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
                                </div>
                        </div>  
                    </div>
            </div>
        </section>
                <section class="comments" id="comments">

                <hr>
                <div class="header_comments">
                    <div class="initial_sec_comments">
                        <h2 id="am_c"><?php echo $amount; ?></h2>
                        <h2>comentário<?php if($amount != 1) echo "s"; ?></h2>
                    </div>
                    
                <?php 

                    if($amount > 1):
                
                ?>
                    <div class="order_comments">
                        <div class="select">
                            <select id="type-s" onchange="comment_reorder()">
                            <option value="1">Mais velhos</option>
                            <option value="2">Mais novos</option>
                            </select>
                        </div>
                    </div>
                
                <?php endif; ?>
                </div>


                <div class="comments-container" id="cont_comment">

                <?php 
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
                        
                        if($prepare->rowCount() != 0):
                            
                        ?>

                            <?php foreach ($pdo->query($sql) as $key => $value):

$perfil = 0;

                                if($value['cod'] == $perfil){
                                    $class = "mine";
                                    $classC = "mineC";
                                    $classA = "mineA";
                                    
                                }else{
                                    $class = "regular";
                                    $classC = "";
                                    $classA = "";
                                    $del = '<a href="delete_comment.php?id_comment='.$value['id_comment'].'"><i class="fa-solid fa-trash"></i></a>';
                                }

                                ?>

                                <div class="comment-container <?php echo $class; ?>">
                                        <div class="arrow <?php echo $classA; ?>"></div>
                                        <div class="comment <?php echo $classC; ?>">
                                        <div class="cheader">
                                                <div class="row-c">
                                                    <div class="pic" style="<?php echo $value['foto']; ?>">

                                                    </div>
                                                    <div class="name">
                                                        <a href="user.php?profile=<?php echo $value['cod']; ?>"><?php echo $value['nome']; ?></a>
                                                    </div>
                                                    <div class="cntr">
                                                        <?php echo $del; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content-comment">
                                                <?php echo $value['text']; ?>
                                            </div>
                                        </div>
                                    </div>

                            <?php endforeach; ?>
                        

                        <?php endif; ?>

                    </div>
            </section>

        
    </div>
    <script>

        function randomIntFromInterval(min, max) { // min and max included 
        return Math.floor(Math.random() * (max - min + 1) + min)
        }

        var style = document.querySelector('.quest').style;
        
        var imgs = document.querySelectorAll(".img_story img");

        imgs.forEach(img => {
            img.addEventListener("click", () =>{
                img.classList.toggle("activeZoom")
            })
        })

        var img_story = document.getElementsByClassName("img_story")

        function generate(){
          for(var i = 0; i < imgs.length; i++){
                numb = randomIntFromInterval(-5, 5);

                imgs[i].style.transform = 
                "rotate("+numb+"deg)";

                var ac_h = img_story[i].offsetHeight;
                img_story[i].style.height = ac_h + "px";
            }  
        }

        generate()
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

            if(isset($_SESSION['story']) && $_SESSION['story'] != -1):
        ?>
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
    
                callNotification(<?php echo $n_type ?>)

                <?php $_SESSION['story'] = -1; ?>

        <?php endif; ?>


var stars = document.getElementById("full-stars")

        var qP = <?php echo $rating ?>;

        stars.style.width = calcStar(qP) + "%";     
        
        function calcStar(points){
            return (100*points)/5;
        }

    </script>
    <script src="../js/story.js?v=1.031242<?php echo rand(0,10000)?>"></script>

</body>
</html>