<?php

    require '../conexao.inc';

    $vnome = $_GET['f_nome'];
    $vsenha = $_GET['f_senha'];
    $vsexo = $_GET['f_sexo'];
    $vesporte = $_GET['f_esporte'];

    if(isset($_GET['f_tcarro'])){
        $vtcarro = $_GET['f_tcarro'];
        //$vtcarro = 1;
    } else {
        $vtcarro = 0;
    }
    if(isset($_GET['f_tmoto'])){
        $vtmoto = $_GET['f_tmoto'];
    } else {
        $vtmoto = 0;
    }
    if(isset($_GET['f_tonibus'])){
        $vtonibus = $_GET['f_tonibus'];
    } else {
        $vtonibus = 0;
    }

    $vcoment = $_GET['f_coment'];

    $sql = "INSERT INTO tb_revisao VALUES(NULL, '$vnome', '$vsenha', '$vsexo', '$vesporte', '$vtcarro', '$vtmoto', '$vtonibus', '$vcoment')";
    $res = mysqli_query($con, $sql);

    echo "Registro gravado<br>";
    echo "<a href=formRevisao.html target=_self>voltar</a>";

    mysqli_close($con);


?>