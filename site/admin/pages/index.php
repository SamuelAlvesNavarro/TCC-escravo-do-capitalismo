<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body data-bs-theme="dark">
    <div class="main">
        <h1>Admin</h1>
        <form action="login.php" method="post">
            <input type="email" name="email" id="" value="admin@gmail.com"><br>
            <input type="password" name="senha" id="" value="admin1234"><br>
            <input type="submit" value="Enviar" class="btn btn-dark">
        </form>
    </div>
</body>
</html>