<?php

$local_serve = "localhost";      // local do servidor
$usuario_serve = "root";         // nome do usuario
$senha_serve = "";                  // senha
$banco = "bancouser";      // nome do banco de dados

$conn = mysqli_connect($local_serve,$usuario_serve,$senha_serve,$banco) or die ("Não foi possivel conectar-se ao banco de dados!");

$usuario2 = $_POST['usuario1'];
$senha2 = md5($_POST['senha1']);

//efetua uma busca no banco de dados do usuario e senha informados
$sqlbusca = "SELECT * FROM tb_user WHERE usuario = '$usuario2' AND senha = '$senha2'";

//executa o comando e armazena os resultados na variavel dados
$dados = mysqli_query($conn, $sqlbusca) or die("Não foi possível buscar os dados");

//faz a comparação se encontrou algum registro (linha)
if (mysqli_num_rows($dados)<=0){
    echo "Usuario nao cadastrado ou dados inválidos";
}
else{
    echo "Login efetuado com sucesso!!! ";
}

echo " <a href='login.html'>Voltar</a> ";

?>