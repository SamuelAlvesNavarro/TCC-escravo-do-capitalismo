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
        <div class="sideBar">
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
            <div class="page slide">
                <div class="history">
                    <div class="writing">
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
                        <div class="lines">
                            <div class="text" spellcheck="false">
                                <!-- AQUI VÃO AS IMAGENS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page slide">
                <div class="history">
                    <div class="writing">
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
                            <div class="text" spellcheck="false">
                                <!-- AQUI VÃO AS REFERENCIAS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="interaction-container">
                <div class="question-container"></div>
                <div class="rating-container"></div>
            </div>
        </div>
    </div>
</body>
<script src="../js/story.js?v=1.01"></script>
</html>