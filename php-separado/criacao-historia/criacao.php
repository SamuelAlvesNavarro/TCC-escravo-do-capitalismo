<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Fotos</h1>
            <div class="page-expl">
                <ul>
                    <li>Limite de 10 imagens;</li>
                    <li>Só serão aceitos os formatos: jpg, jpeg e png.</li>
                </ul>
            </div>
        </div>
        
        <form method="post" action="img-pasta.php" enctype="multipart/form-data">
            <input type="file" name="imagem" accept=".jpg, .jpeg, .png" id="" value="Enviar Arquivo"><br>
            <input type="file" name="imagem2" accept=".jpg, .jpeg, .png" id="" value="Enviar Arquivo"><br>
            <input type="submit" value="Enviar">
        </form>

</body>
</html>