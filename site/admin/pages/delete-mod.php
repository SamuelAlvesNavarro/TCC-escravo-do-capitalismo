<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Mod</title>
</head>
<body>
    
    <h1>Coloque o email do Mod, e click em DELETAR</h1>
    <form action="delete-mod_exe.php" method="post">
        <label for="">Email: </label>
        <input type="email" name="email">
        <button>Deletar</button>
    </form>

</body>
</html>