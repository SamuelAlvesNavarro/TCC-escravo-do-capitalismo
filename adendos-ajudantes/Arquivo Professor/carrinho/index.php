<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public\css\bootstrap.min.css">
    <title>Carrinho de compras</title>   
</head>

    <body>
    <?php
          $conn=mysqli_connect("localhost", "root", "","carrinho");
                   
          $sql = "SELECT * FROM produtos";
          $qr = mysqli_query($conn,$sql) or die(mysqli_error());
          while($ln = mysqli_fetch_assoc($qr)){
             echo '<h2>'.$ln['nome'].'</h2> <br />';
             echo 'Preço : R$ '.number_format($ln['preco'], 2, ',', '.').'<br />';
             echo '<img src="img/'.$ln['imagem'].'" /> <br />';
             echo '<a href="carrinho.php?acao=add&id='.$ln['id'].'">Comprar</a>';
             echo '<br /><hr />';
          }
    ?>

    </body>

    </html>
