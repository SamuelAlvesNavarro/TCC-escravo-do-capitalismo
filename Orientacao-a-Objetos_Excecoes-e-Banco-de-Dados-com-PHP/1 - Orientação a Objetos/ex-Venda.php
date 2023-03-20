<?php

declare(strict_types = 1);

class Venda
{
    private string $data;
    private string $produto;
    private int $quantidade;
    private float $valorTotal;

    public function __construct(
        string $data, 
        string $produto,
        int $quantidade, 
        float $valorTotal
    ){
        $this->data = $data;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->valorTotal = $valorTotal;
    }

    public function exibir()
    {
        echo "Data: " . $this->data;
        echo "<br>"; 
        echo "Produto: " . $this->produto; 
        echo "<br>"; 
        echo "Quantidade: " . $this->quantidade;
        echo "<br>";  
        echo "Valor Total: " . $this->valorTotal;
    }
}

$venda = new Venda(
    '09/01/2023', //data
    'Chocolate', //produto
    4, //quantidade
    20.00 //valorTotal
);

$venda->exibir();

?>