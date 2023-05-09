<?php
    require "includes/conexao.php";
    require "includes/online.php";

    echo $_POST['input_1'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>História</title>
    <link rel="stylesheet" href="../css/story.css?v=1">
</head>
<body>
    <!-- <div class="container" id="containerBook">
        <div class="book" id="book">
            <div class="front">
                <div class="fpage">

                </div>
                <div class="cover">
                    <div class="num-up">
                        <h1>Título, seja lá qual for</h1>
                    </div>	
                    <div class="author"><h6><a href="LINK DO PERFIL DO AUTOR" target="_blank" rel="noopener noreferrer">Autor</a></h6></div>
                </div>
            </div>
            <div class="left-side">
                
            </div>
        </div>
    </div> -->
    <div class="all transi" id="all">
        <div class="f-column">
            <div class="story-all-container">
                <div class="paper">
                    <div class="page-markers">
                        <div onclick="changeNumbers(0)" class="maker history-page-marker">
                            History
                        </div>
                        <div onclick="changeNumbers(1)" class="maker images-page-marker">
                            Imagens
                        </div>
                        <div onclick="changeNumbers(2)" class="maker references-page-marker">
                            Referências
                        </div>
                    </div>
                    <div class="history">
                        <div class="writing">
                            <div id="title-container" class="story-title-container">
                                <div class="story-title transi">
                                    <h1 class="transi">Jack, o Estripador</h1>
                                </div>
                                <div class="bt-open-close">
                                    <div onclick = "checkStuff(0)" class="bt">
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
                                <div class="text" contenteditable spellcheck="false">
                                    You can edit this text: <br><br>
                                    
                                    Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. ChhYou can edit this text! Cupcake ipsum dolor sit amet liquorice You cffffffffffffffffffffffffffffffffYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. ChhYou can edit this text! Cupcake ipsum dolor sit amet liquorice You cffffffffffffffffffffffffffffffffYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. ChhYou can edit this text! Cupcake ipsum dolor sit amet liquorice You cffffffffffffffffffffffffffffffffYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. ChhYou can edit this text! Cupcake ipsum dolor sit amet liquorice You cffffffffffffffffffffffffffffffffYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. ChhYou can edit this text! Cupcake ipsum dolor sit amet liquorice You cffffffffffffffffffffffffffffffffYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. ChhYou can edit this text! Cupcake ipsum dolor sit amet liquorice You cffffffffffffffffffffffffffffffffYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu dragée wafer. Croissant cookie lemon drops tiramisu jelly-o donut. Sweet gummi bears ice cream.
                                    You can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Chocolate cake apple pie candy canes tiramisu hYou can edit this text! Cupcake ipsum dolor sit amet liquorice fruitcake. Candy canes jelly beans sweet roll cupcake lollipop. Powder carrot cake toffee brownie. Marshmallow sweet roll donut. Cho
                                </div>
                            </div>
                            <!-- <div class="readmore">
                                <a href="#" target="_blank" rel="noopener noreferrer">Ler Tudo</a>
                            </div> -->
                        </div>
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