<?php include "verifica_autenticacao.php" ?>
<?php
   echo "NOSSA TELA RESTRITA";
   echo "<br>";
   echo "A sessao esta aberta";
   echo "<br>";
   $usuario = $_SESSION['usuario'];
   echo "Usuario logado: $usuario";


echo " <a href='login.html'>Voltar</a> ";   

?>