<?php

declare(strict_types = 1);

$pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
$sql = 'select pontos_leitor, nome from user_common order by pontos_leitor desc limit 3';

echo '<h3>Maior Pontuação: </h3>';

foreach ($pdo->query($sql) as $key => $value) {
    echo 'Pontos de leitor: ' . $value['pontos_leitor'] . '<br> Nome: ' . $value['nome'] . '<hr>';
}
?>