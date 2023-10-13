<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel Teste</title>
    <link rel="stylesheet" href="../css/teste_ajax_2.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>
<body>
    <div>
       <input id="query" type="text" value="<?php echo $_GET['busca'] ?>"> 
       <button onclick="buscar()">Pesquisar</button>
    </div>
    <div id="results">

    </div>
    <!--<div class="pg" onclick="generate(0)">
        1
    </div>
    <div class="pg" onclick="generate(1)">
        2
    </div>
    <div class="pg" onclick="generate(2)">
        3
    </div>
    <div class="pg"onclick="generate(3)">
        4
    </div>
    <div class="pg"onclick="generate(4)">
        5
    </div>
    <div class="pg"onclick="generate(5)">
        6
    </div>
    <div class="pg"onclick="generate(6)">
        7
    </div>
    <div class="pg"onclick="generate(7)">
        8
    </div>
    <div class="pg"onclick="generate(8)">
        9
    </div>
    <div class="pg"onclick="generate(9)">
        10
    </div>-->
    <script src="../js/teste_ajax_2.js?v=1.01"></script>
</body>
</html>