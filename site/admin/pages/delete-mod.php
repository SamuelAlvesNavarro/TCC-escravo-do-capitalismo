<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css?v=1.01" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Delete Mod</title>
</head>
<body data-bs-theme="dark">
    
    <h1>Coloque o email do Mod, e click em DELETAR</h1>
    <form action="delete-mod_exe.php" method="post">
        <label for="">Email: </label>
        <input type="email" name="email">
        <button>Deletar</button>
    </form>

</body>
</html>