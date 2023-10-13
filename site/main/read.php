<?php
    require "../conexao.php";

    $story = "SELECT id_story from story where status = 3 order by id_story desc limit 1";
    foreach ($pdo->query($story) as $key => $value) {
        $id_story = $value['id_story'];
    }

    function RetornarIdPage($id_story, $type){
        global $pdo;
        $page = "SELECT id_page from page where fk_id_story = $id_story and type = $type";
        foreach ($pdo->query($page) as $key => $value) {
            $id_page = $value['id_page'];
            return $id_page;
        }
    }
    if(isset($id_story)){

        $_SESSION['id_story'] = $id_story;
        $story = "SELECT * from story where id_story = $id_story and status = 3";
        $prepare = $pdo->prepare($story);
        $prepare->execute();

        if($prepare->rowCount() == 0){
            sendToError(14);
            exit;
        }

        foreach ($pdo->query($story) as $key => $value) {

            $titulo = $value['nome'];
            $rating = $value['rating'];
        }
    }else{
        header('Location: index.php');
        exit;
    }

    /* GUARDANDO NA SESSÃO */

    $_SESSION['current_story'] = $id_story;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/story.css?v=1.01<?php echo rand(0,10000)?>">
    <link rel="stylesheet" href="css/scroll.css?v=1.01">
    <link rel="shortcut icon" href="svg/logo.svg" type="image/x-icon">
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
            <i class="fa-solid fa-sun mode"></i>
        </section>
        <section class="menuH">
            <div class="el-container">
                <div class="controls">
                    <div class="back-to-central-bt">
                        <a href="index.php">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
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
                                    echo '<span style="color: white !important;">'.$value['nome'].'</span>';
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
            </div>
        </section>
    </div>
    <script>
    
        var stars = document.getElementById("full-stars")

        var qP = <?php echo $rating ?>;

        stars.style.width = calcStar(qP) + "%";     
        
        function calcStar(points){
            return (100*points)/5;
        }

    </script>
    <script src="js/story.js?v=1.03124"></script>
</body>
</html>