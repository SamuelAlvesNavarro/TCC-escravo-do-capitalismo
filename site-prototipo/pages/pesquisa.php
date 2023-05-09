<?php
    require "includes/conexao.php";
    require "includes/online.php";
    $pesquisa = $_POST['busca'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
</head>
<body>
    Lembrete: complicou / da central já vai vir um texto, ent a página já vai estar recebendo algo para pesquisar, mas a barra de pesquisa (da página) tem que funcionar.<br><br>
    <br><br><br>TODAS AS PÁGINAS DEPOIS DO LOGIN TEM QUE VER SE O USUÁRIO ENTRANDO ESTÁ LOGADO. SE A PÁGINA N TEM DADOS DA PESSOA, TEM QUE MANDAR ELA DEVOLTA PARA O LOGIN. <br><br><br>
    <hr>
    <form method="POST" action="pesquisa.php">
        <input type="text" name="busca" id="" class="searchbar">
        <button>Pesquisar</button>
    </form>
    <a style="margin: 2vw;" href=../../php-separado/cadastro/central.php>Volta</a>
    <br><br>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulos = array();
            $i = 0;
            $pesquisa = $_POST['busca'];
            $sql = "SELECT * FROM story";

            foreach($pdo->query($sql) as $key => $value){
                $titulos[$i][0] = $value["nome"];
                $sim = similar_text($titulos[$i][0], $pesquisa, $perc);
                $titulos[$i][1] = $perc;
                $titulos[$i][2] = $value["id_story"];
                $i++;
            }

            $key_values = array_column($titulos, 1); 
            array_multisort($key_values, SORT_DESC, $titulos);

            if($titulos[0][1] == 0){ // if TRUE ---> Não houve correspondência no banco
                echo "<hr><br><br> Não há resultados. Conteúdos Relacionados: <br><br>";

                for($i = 0; $i < sizeof($titulos); $i++){

                    echo "<a href='story.php'>". $titulos[$i][0] ."</a><br>";
                }  

            }else{

                for($i = 0; $i < sizeof($titulos); $i++){
                    echo "<a href='story.php'>". $titulos[$i][0] ."</a><br>";
                }  
            }   
        }
    ?>
<div class="hide">

    <form action="story.php">
        <input type="number" name="id_story" id="">
    </form>
</div>
</body>
</html>