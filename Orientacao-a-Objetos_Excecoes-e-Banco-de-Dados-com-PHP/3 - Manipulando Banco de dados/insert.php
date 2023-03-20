<?php

declare(strict_types = 1);

//$pdo = require 'connect.php'; - por algum motivo estranho não está funcionando assim

$pdo = new PDO('mysql:host=localhost;dbname=exemplo', 'root', '');
$sql = 'insert into produtos(descricao) values(?)';

$prepare = $pdo->prepare($sql);

$prepare -> bindParam(1, $_GET['descricao']);
$prepare -> execute();

echo $prepare -> rowCount();

?>