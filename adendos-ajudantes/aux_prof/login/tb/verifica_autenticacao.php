<?php
  if(session_status() == PHP_SESSION_NONE){ //Se não existir a sessão ela será iniciada
      session_start();
  }
  if (empty($_SESSION['usuario'])){ //Se a variavel de sessão estiver vazia ele não entra e volta para tela de login
      header("Location: login.html");
  }
  

?>