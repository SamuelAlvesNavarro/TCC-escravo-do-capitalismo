<?php

class contaBancaria
{
    //public - private - protected
    public $banco;
    public $nomeTitular = "Samuel Alves";
    private $numeroAgencia = 3467;
    public $numeroConta;
    public $saldo = 10000.00;
}

$conta = new contaBancaria(123, "Samuel Alves", 3547, 111, 1000);

var_dump($conta->saldo);

$conta->saldo = 1000.00;

var_dump($conta->saldo);

?>