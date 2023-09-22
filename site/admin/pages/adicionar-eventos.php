<?php
    require "includes/conexao.php";
    require "includes/online.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Adicionar gadgets</title>
</head>
<body  data-bs-theme="dark">
    <?php
        include "includes/menu.php";
    ?>
    <h1 align="center">Adicionar Novo Gadget</h1>
    <br>
    <form action="adicionar-eventos_exe.php" method="post" class="container border border-2 table-bordered p-4" style="width: 50%;">
        <label class="form-label">Titulo:</label>
        <input type="text" name="titulo" required class="form-control"><br><br>

        <label class="form-label">Tipo:</label>
        <input type="number" name="type" id="" required class="form-control" placeholder="Se estiver em dúvida, verifique os tipos"><br><br>

        <label class="form-label">Descrição:</label>
        <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea><br><br>

        <label class="form-label">Função a ser executada: </label><br>
        <input type="radio" name="funcao" onclick="openX(2)" required value="2">Dar gadget <br>
        <input type="radio" name="funcao" onclick="openX(1)" required value="1">Dar moedas<br><br>
        <input type="hidden" id='num' name="number" placeholder="Quantidade de Moedas" class="form-control" required>

        <div id="gadgets" style="display: none;">
            <select name="num" id="gadget">
                <option value="">Selecione...</option>
                <?php 
                    $sql = "SELECT * FROM gadget WHERE g_status = 1 AND id_gadget != 1 AND id_gadget != 2";
                    foreach($pdo->query($sql) as $key => $value):
                ?>
                    <option value="<?php echo $value['id_gadget']; ?>"><?php echo $value['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <input type="hidden" id='mand' value="Mandar" class="btn btn-primary">

    </form>
    <script>
        function openX(n){
            document.getElementById('mand').setAttribute('type', 'submit');

            if(n == 2){
                document.getElementById('gadgets').style.display = 'block';
                document.getElementById('num').type = 'hidden';
                document.getElementById('gadget').required = true;
            }

            if(n == 1){
                document.getElementById('gadgets').style.display = 'none';
                document.getElementById('num').type = 'number';
                document.getElementById('gadget').required = false;
            }
        }
    </script>
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
</body>
</html>