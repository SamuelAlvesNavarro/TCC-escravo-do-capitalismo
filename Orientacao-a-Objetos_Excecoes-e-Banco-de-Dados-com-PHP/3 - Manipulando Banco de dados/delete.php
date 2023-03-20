<?php

declare(strict_types = 1);

//$pdo = require 'connect.php'; - por algum motivo estranho não está funcionando assim

$pdo = new PDO('mysql:host=localhost;dbname=exemplo', 'root', '');
$sql = 'delete from produtos where id = ?';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['id']);
$prepare->execute();

echo $prepare->rowCount();