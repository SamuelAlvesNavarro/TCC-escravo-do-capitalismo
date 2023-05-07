<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/story.css?v=1">
</head>
<body>
    <div class="container" id="containerBook">
        <div class="book" id="book">
            <div class="front">
                <div class="cover">
                    <p class="num-up typing-ani">Título</p>	
                    <p class="author typing-ani">Autor</p>
                </div>
            </div>
            <div class="left-side">
                <h2>
                    <span>Título</span>
                </h2>
            </div>
        </div>
    </div>
    <div class="all transi" id="all">
        <div class="f-column">
            <div class="story-all-container">
                <div class="story-container">
                    <div id="title-container" class="story-title-container">
                        <div class="story-title transi">
                            <h1 class="typing-ani transi">Jack, o Estripador</h1>
                        </div>
                        <div class="classif">
                            <div class="stars"> 
                                <div class="ratings typing-ani transi">
                                    <div class="empty-stars"></div>
                                    <div id="full-stars"></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="story-file" id="story-file">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="s-column">

        </div>
    </div>
</body>
<script src="../js/story.js?v=1"></script>
</html>