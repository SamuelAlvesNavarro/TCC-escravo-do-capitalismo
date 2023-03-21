<?php

require 'Blog.php';

$blog = new Blog();

switch($_GET['operation']) {
    case 'list':

        echo '<h3>Posts: </h3>';

        foreach ($blog->list() as $value) {
            echo 'Id: ' . $value['id'] . '<br> Descrição: ' . $value['descricao'] . '<hr>';
        }

        break;
    case 'insert':
        
        $status = $blog->insert('Post Teste do Samuel Alves');

        if(!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro inserido com sucesso";

        break;
    case 'update':

        $status = $blog->update('Post Alterado do Samuel Alves', $_GET['id']);

        if(!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro atualizado com sucesso!";

        break;
    case 'delete':

        $status = $blog->delete($_GET['id']);

        if(!$status) {
            echo "Não foi possível executar a operação!";
            return false;
        }

        echo "Registro removido com sucesso!";

        break;
}