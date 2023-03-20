<?php

function divisao($n1, $n2)
{
    if(($n1 == 0) || ($n2 == 0)){
        throw new Exception("É impossível fazer uma divisão com o número 0!");
    }

    return $n1 / $n2;
}

$n1 = 0;
$n2 = 8;

try {
    $res = divisao($n1, $n2);
    echo "O resultado da divisão entre $n1 e $n2 é: $res\n";
} catch (Exception $e){
    echo $e->getMessage();
    die(); // ou exit();, return false;
}

?>