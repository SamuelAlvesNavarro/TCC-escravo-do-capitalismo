<?php

$local_serve = "localhost";      // local do servidor
$usuario_serve = "root";         // nome do usuario
$senha_serve = "";                  // senha
$banco = "locadora";      // nome do banco de dados

$conn = mysqli_connect($local_serve,$usuario_serve,$senha_serve,$banco) or die ("Não foi possivel conectar-se ao banco de dados!");

/*"pega" os dados digitados no form, através do método POST.*/
//ISSET - Valida os valores antes de inserir eles no banco, garantindi que exista essa chave dentro da array

//if( isset($_POST['nome']) && isset($_POST['cpf']) 
//&& isset($_POST['email']) && isset($_POST['telefone']) 
//&& isset($_POST['rua']) && isset($_POST['numero']) 
//&& isset($_POST['cidade']) && isset($_POST['estado']))  { 

$modelo = $_POST['modelo'];
$placa= $_POST['placa'];
$chassi = $_POST['chassi'];
$fabric = $_POST['fabricante'];
$ano = $_POST['ano'];
$cor = $_POST['cor'];
$tipo = $_POST['tipo'];
$kilom = $_POST['km'];
$comb = $_POST['combustivel'];
$preco = $_POST['preco'];
$imagem = $_POST['imagem'];

//};
/*Inserindo os dados na Tabela "dados" através de comandos MySQL.*/

$sqlinsert = "INSERT INTO veiculos(modelo,placa,chassi,fabricante,ano,cor,tipo,km,combustivel,preco,imagem)
VALUES('$modelo','$placa','$chassi','$fabric','$ano','$cor','$tipo','$kilom','$comb','$preco','$imagem')";

mysqli_query($conn, $sqlinsert) or die("Não foi possível inserir os dados"); 

/*Mostra na tela os dados inseridos.*/

//echo "Inseridos na Tabela DADOS <br />Nome: $nome 
//<br /> Nascimento: $nasc <br /> Email: $email <br /> Site: $st <br /> Quantidade Filhos: $qtd <br /> Salario: $salar";
//echo "<br>";

echo " <a href='index.html'>Voltar</a> ";

?>
