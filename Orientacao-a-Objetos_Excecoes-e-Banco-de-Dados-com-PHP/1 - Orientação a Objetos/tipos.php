<?php

declare(strict_types = 1);

class contaBancaria
{
    private string $banco;
    private string $nomeTitular;
    private string $numeroAgencia;
    private string $numeroConta;
    private float $saldo;

    public function __construct(
        string $banco, 
        string $nomeTitular, 
        string $numeroAgencia, 
        string $numeroConta, 
        float $saldo
    ) {
        $this->banco = $banco;
        $this->nomeTitular = $nomeTitular;
        $this->numeroAgencia = $numeroAgencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldo;
    }

    public function obterSaldo(): string
    {
        return "Seu saldo atual é: R$ " . $this->saldo;
    }

    public function depositar(float $valor): string 
    {
        $this->saldo += $valor;
        return "Depósito de R$ " . $valor . " realizado!";
    }

    public function sacar(float $valor): string 
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