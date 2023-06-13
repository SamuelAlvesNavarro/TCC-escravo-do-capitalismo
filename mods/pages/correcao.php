<?php
    include "includes/conexao.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correção Geral</title>
</head>
<body>
    <h1>Para corrigir (status = 1)</h1>
    <h3>Antes de corrigir uma história, <strong>ATUALIZE A PÁGINA</strong></h3>
    <ul>
        <?php 
            $sql = "select id_story from story where status = 1";
            $pCorrigir = "SELECT * FROM story where status = 1 ORDER BY rating asc";
            foreach($pdo->query($pCorrigir) as $key => $value){
                $id_story = $value['id_story'];
                $nome = $value['nome'];
                echo "<li><a onclick='corrigir(". $id_story .")'>$nome</a></li><br>";
            }
        ?>
    </ul>
    <div id="hidden_form_container" style="display:none;"></div>

    <script>
        function corrigir(n){
            var theForm, newInput1;
            theForm = document.createElement('form');
            theForm.action = 'programaticos/emCorrecao.php';
            theForm.method = 'post';
            newInput1 = document.createElement('input');
            newInput1.type = 'hidden';
            newInput1.name = 'id_story';
            newInput1.value = n;
            theForm.appendChild(newInput1);
            document.getElementById('hidden_form_container').appendChild(theForm);
            theForm.submit();
        }
    </script>
</body>
</html>