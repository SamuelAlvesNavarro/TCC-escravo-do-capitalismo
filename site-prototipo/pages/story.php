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
    if(isset($_POST['input_1'])){
        $id_story = $_POST['input_1'];
        $story = "SELECT * from story where id_story = $id_story";
        foreach ($pdo->query($story) as $key => $value) {
            $titulo = $value['nome'];
        }
    }else{
        header("Location: error.php");
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
            ?>
            <?php
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
                <div class="answered">
                    <h1>Você já respondeu essa pergunta!</h1>          
                </div>
                <div class="unanswered" style="display:none">
                    <div class="question-container">
                        <div class="question">
                            <!-- aqui tem que vir a pergunta -->
                            A pergunta é: qual cu foi comido por Peter Pan?
                        </div>
                        <div class="options">
                            <div class="col1-op op-col">
                                <div class="option">
                                option 1
                                </div>
                                <div class="option">
                                    option 2
                                </div>
                            </div>
                            <div class="col2-op op-col">
                                <div class="option">
                                    option 4
                                </div>
                                <div class="option">
                                    option 3
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="rating-container">
                        <div class="noAnswer" style="display:block;">
                            <div class="things-container-noAnswer">
                                <div class="rating-part">
                                    <h1>Você ainda não respondeu à pergunta</h1>
                                </div>
                            </div>
                        </div>
                        <div class="right" style="display:none">
                            <div class="things-container" style="background-color: #1f4921;">
                                <div class="rating-part">
                                    <h1>Você Acertou</h1>
                                </div>
                                <div class="rating-part rating-container-input">
                                    <form id="form-container" action="" method="post">
                                        <input type="number" name="rating" id="rating-input" max="5" min="1" placeholder="Dê uma nota à história!"><br>
                                        <input type="submit" value="Enviar" id="rating-input-submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="wrong" style="display:none">
                            <div class="things-container" style="background-color: rgb(87, 17, 17);">
                                <div class="rating-part">
                                    <h1>Você Errou</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/story.js?v=1.01"></script>
</html>