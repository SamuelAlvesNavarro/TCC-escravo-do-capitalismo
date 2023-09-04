<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/story2.css">
    <title>História</title>
</head>
<body>
    <div class="all" id="all">
        <section class="story">

        </section>
        <section class="questComments">

        </section>
    </div>
    <script>
        function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}

        var all = document.getElementById('all');

        function getBloody(){
            all.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
        }

        getBloody();
    </script>
</body>
</html>