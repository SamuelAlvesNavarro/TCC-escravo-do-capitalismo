<?php

require 'Produto.php';

$produto = new Produto();

switch($_GET['operation']) {
    case 'list':
        echo '<h3>Produtos: </h3>';

        foreach ($produto->list() as $value) {
            echo 'Id: ' . $value['id'] . '<br> Descrição: ' . $value['descricao'] . '<hr>';
        }

        break;
    case 'insert':
        
        $status = $produto->insert('Produto Teste do Samuel Alves 01');

        if(!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro inserido com sucesso";

        break;
    case 'update':

        $status = $produto->update('Produto Alterado do Samuel Alves', $_GET['id']);

        if(!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro inserido com sucesso!";

        break;
    case 'delete':

        $status = $produto->delete(3);

        if(!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro removido com sucesso!";

        break;
}