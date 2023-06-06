<?php
    require "includes/conexao.php";
    require "includes/online.php";
    $pesquisa = '';
    if(isset($_GET['busca']))$pesquisa = $_GET['busca'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/pesquisa.css">
    <title>Pesquisa</title>
</head>
<body>
    <div class="nav">
        <div class="logo-pic">
            <svg id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
        </div>
        <div class="acess-menu">
            
        </div>
    </div>
    <div class="main">
        <div class="search-bar-container">
            <form method="get" action="pesquisa.php">
                <div class="bar">
                    <input type="text" name="busca" id="" class="searchbar">
                    <button>Pesquisar</button>
                </div>
            </form>
        </div>
        
        <a style="margin: 2vw;" href='central.php'>Volta</a>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $titulos = array();
                $i = 0;

                if(isset($_GET['busca']) && $_GET['busca'] != ""){

                    $pesquisa = $_GET['busca'];
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
                        echo "<hr><br><br> Não há resultados para essa pesquisa, tente novamente considerando que a pesquisa diferencia letras maiúsculas e minúsculas. Conteúdos Relacionados: <br><br>";

                        for($i = 0; $i < sizeof($titulos); $i++){
                            $id_story = $titulos[$i][2];
                            echo "<a href='#' onclick='story(".$titulos[$i][2].")'>". $titulos[$i][0] ."</a><br>";
                        }  

                    }else{

                        for($i = 0; $i < sizeof($titulos); $i++){
                            echo "<a href='#' onclick='story(".$titulos[$i][2].")'>". $titulos[$i][0] ."</a><br>";
                        }  
                    } 

                }else if($_GET['busca'] != ""){

                    $pesquisa = "";
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

                    if(isset($titulos[0][1])){
                        if($titulos[0][1] == 0){
                            echo "<hr><br><br> Não há resultados para essa pesquisa, tente novamente considerando que a pesquisa diferencia letras maiúsculas e minúsculas. Conteúdos Relacionados: <br><br>";
        
                            for($i = 0; $i < sizeof($titulos); $i++){
                                $id_story = $titulos[$i][2];
                                echo "<a href='#' onclick='story(".$titulos[$i][2].")'>". $titulos[$i][0] ."</a><br>";
                            }  
        
                        }
                    }
                }else{
                    echo "Sua pesquisa está vazia! Tente novamente";
                }
            }
        ?>
    </div>
<div id="hidden_form_container" style="display:none;"></div>

<script>
    function story(n) {
        var theForm, newInput1;
        theForm = document.createElement('form');
        theForm.action = 'story.php';
        theForm.method = 'get';
        newInput1 = document.createElement('input');
        newInput1.type = 'hidden';
        newInput1.name = 'input_1';
        newInput1.value = n;
        theForm.appendChild(newInput1);
        document.getElementById('hidden_form_container').appendChild(theForm);
        theForm.submit();
    }
</script>

</body>
</html>