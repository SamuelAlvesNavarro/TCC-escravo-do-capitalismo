<?php
    $pdo = new PDO('mysql:host=localhost;dbname=id20545858_pi', 'id20545858_samuel', 'Agx3((dO5ze*n-]Y');
    function isOnline(){
        session_start();
        if(isset($_SESSION['email'])){
            return true;
            }
        return false;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    Lembrete: se foderam <br><br>
    <br><br><br>TODAS AS PÁGINAS DEPOIS DO LOGIN TEM QUE VER SE O USUÁRIO ENTRANDO ESTÁ LOGADO. SE A PÁGINA N TEM DADOS DA PESSOA, TEM QUE MANDAR ELA DEVOLTA PARA O LOGIN. <br><br><br>
    <hr>
    <div class="privdata" id="privdata">
        <br>
        ISSO TEM QUE ESTAR INVISÍVEL SE A PESSOA ENTRANDO N FOR O DONO DO PERFIL

        <div class="data">
            Nessa parte deem echo em todos os dados
        </div>
    </div>
    <div class="histprof">
        <br>
        NESSA PARTE, TEM QUE MOSTAR TODAS AS HISTÓRIAS LIGADAS A ESSE PERFIL <strong>COM LINK</strong>
    </div>
</body>
</html>