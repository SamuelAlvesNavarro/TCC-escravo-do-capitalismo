<?php

declare(strict_types = 1);

$pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
$sql = 'select max(pontos_leitor) from user_common';

echo '<h3>Maior Pontuação: </h3>';

foreach ($pdo->query($sql) as $key => $value) {
    echo 'Pontos de leitor: ' . $value['pontos_leitor'] . '<br> Nome: ' . $value['nome'] . '<hr>';
}
?>