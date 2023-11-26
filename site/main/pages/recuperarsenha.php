<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/recuperar.css?v=1.01">
    <link rel="stylesheet" href="../css/scroll.css?v=1.09">
    <link rel="shortcut icon" href="../svg/logo.svg" type="image/x-icon">
    <script src="https://kit.fontawesome.com/f2389f6c39.js" crossorigin="anonymous"></script>
    <title>Recuperação de Senha</title>
</head>
<body>
    <?php
        require "includes/loading.php";
    ?>
    <div class="go-back">
        <a href="acesso.html"><i class="fa-solid fa-chevron-left"></i></a>
    </div>
    <div class="all">
        <div class="sect">
            <div class="logo">
                <svg class="hist-svg" id="eBYGrpvxAe61" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 500" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><path d="M40.1,467.1l-11.2,9c-3.2,2.5-7.1,3.9-11.1,3.9C8,480,0,472,0,462.2L0,192C0,86,86,0,192,0s192,86,192,192v270.2c0,9.8-8,17.8-17.8,17.8-4,0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1,3.9l-30.5,35c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2,0L141.3,506c-3.3,3.8-8.2,6-13.3,6s-9.9-2.2-13.3-6L84.2,471c-11.3-12.9-30.7-14.6-44.1-3.9ZM160,192c0-17.673112-14.326888-32-32-32s-32,14.326888-32,32s14.326888,32,32,32s32-14.326888,32-32Zm96,32c17.673112,0,32-14.326888,32-32s-14.326888-32-32-32-32,14.326888-32,32s14.326888,32,32,32Z" transform="matrix(.707107 0.707107-.707107 0.707107 180.411309 35.439723)"/></svg>
            </div>
        </div>
        <div class="get-pass">
            <form id="form" method="post" action="result_recover.php">
                <h2>Recuperação <br>de Senha</h2>

                <div class="input-area">
                   <input type="email" name="email" placeholder="Email"><br>
                   <input class="button" type="submit" name="submit" value="Recuperar Senha">
                </div>
            </form>
        </div>
    </div>
</body>
</html>