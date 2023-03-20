<?php

class contaBancaria
{
    //public - private - protected
    private $banco;
    private $nomeTitular;
    private $numeroAgencia;
    private $numeroConta;
    private $saldo;

    public function __construct($banco, $nomeTitular, $numeroAgencia, $numeroConta, $saldo)
    {
        $this->banco = $banco;
        $this->nomeTitular = $nomeTitular;
        $this->numeroAgencia = $numeroAgencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldo;
    }

    public function obterSaldo()
    {
        return "Seu saldo atual é: R$ " . $this->saldo;
    }

    public function depositar($valor)
    {
        $this->saldo += $valor;
        return "Depósito de R$ " . $valor . " realizado!";
    }

    public function sacar($valor)
    {
        $this->saldo -= $valor;
        return "Saque de R$ " . $valor . " realizado!";
    }
}

$conta1 = new contaBancaria(
    'Banco do Brasil',//banco
    'Samuel Alves',//nomeTitular
    '8244',//numeroAgencia
    '57354-10',//numeroConta
    0 //saldo
);

var_dump($conta1);

$conta2 = new contaBancaria(
    'Caixa Economica',//banco
    'Samuel Alves',//nomeTitular
    '4318',//numeroAgencia
    '4332345-10',//numeroConta
    300.00 //saldo
);

var_dump($conta2);

/*
echo $conta->obterSaldo(); // 0

echo "<br>";

echo $conta->depositar(300.00);

echo "<br>";

echo $conta->obterSaldo(); // 300

echo "<br>";

echo $conta->sacar(150.00);

echo "<br>";

echo $conta->obterSaldo(); // 150
*/

?>