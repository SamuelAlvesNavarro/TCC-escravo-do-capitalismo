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
    <a href=../../php-separado/cadastro/central.php>Volta</a>;
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulos = array();
            $i = 0;
            $pesquisa = $_POST['busca'];
            $sql = "SELECT * FROM story";

            foreach($pdo->query($sql) as $key => $value){
                $titulos[$i][0] = $value["nome"];
                echo "<a href='story.php'>". $value['nome'] ."</a><br>";
                $sim = similar_text($titulos[$i][0], $pesquisa, $perc);
                $titulos[$i][1] = $perc;
                $i++;
            }

            $sorting = $titulos;

            for($i = 0; $i < sizeof($titulos); $i++){
                echo "<br>".sizeof($titulos)."<br>";

                
            }
        }
    ?>
</body>
</html>