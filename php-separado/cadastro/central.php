<?php

if(isset($_COOKIE['numLogin'])){
    $n1 = $_GET['num'];
    $n2 = $_COOKIE['numLogin'];
    if($n1 != $n2){
        echo "Login não efetuado";
        exit;
    }
} else {
    echo "Login não efetuado";
    exit;
}

    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');
    echo "<h1>O Leo</h1>";
    echo "<a href=../../site-prototipo/pages/pesquisa.php>Vai</a>";

?>