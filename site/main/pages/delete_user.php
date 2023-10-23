<?php
    include "includes/conexao.php";
    include "includes/online.php";
    include "includes/returnUser.php";
    
    $modo = $_POST['modo'];
    $id_profile = returnProfileId($_SESSION['email']);
    
    if($modo == true){

    }else{
        
    }
?>