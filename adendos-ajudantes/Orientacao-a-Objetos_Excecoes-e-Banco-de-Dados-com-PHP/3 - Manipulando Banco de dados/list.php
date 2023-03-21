<?php

declare(strict_types = 1);

//$pdo = require 'connect.php'; - por algum motivo estranho não está funcionando assim

$pdo = new PDO('mysql:host=localhost;dbname=exemplo', 'root', '');
$sql = 'select * from produtos';

echo '<h3>Produtos: </h3>';

foreach ($pdo->query($sql) as $key => $value) {
    echo 'Id: ' . $value['id'] . '<br> Descrição: ' . $value['descricao'] . '<hr>';
}