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
    <title>Central</title>
</head>
<body>
    Lembrete: entrar na central significa que a pessoa já logou, logo, de alguma maneira, os dados da pessoa já tem que "estar aqui" <br><br>
    <br><br><br>TODAS AS PÁGINAS DEPOIS DO LOGIN TEM QUE VER SE O USUÁRIO ENTRANDO ESTÁ LOGADO. SE A PÁGINA N TEM DADOS DA PESSOA, TEM QUE MANDAR ELA DEVOLTA PARA O LOGIN. <br><br><br>
    <hr>
    <input type="button" value="entrar perfil" class="entrarprf"><br><br>
    <label for="" class="tipor">Buscas</label>
    <select name="" id="" class="tirank">
        <option value="" class="mel">Histórias +</option>
        <option value="" class="mel">Histórias -</option>
    </select>
    <div class="rank" id="rank">
        <br>
        Aqui fica o rank, ent façam o bagui direito
    </div>
    <a href="criacao.php">Ir para a criação de histórias</a>
    <br><br>
    <input type="text" name="" id="busca">
    <input type="button" value="Buscar por nome" class="bpnom">
</body>
</html>