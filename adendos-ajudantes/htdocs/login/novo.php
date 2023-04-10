<?php include "verifica_autenticacao.php" //inclui o arquivo de verificação ?> 

<?php
  echo "TELA RESTRITA A USUARIOS AUTENTICADOS";
  echo "<br>";
  //session_start();
  $usuario = $_SESSION['usuario'];
  echo "<br>";
  echo "Usuario logado: $usuario";
  echo "<br>";

  echo " <a href='login.html'>Voltar</a> ";

?>