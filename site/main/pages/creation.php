<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/creation.css?v=1.01">
    <title>Criação de Histórias</title>
</head>
<body>
    <div class="all">
        <div class="main">
            <div class="title">
                <h1>Título: <input class="text-input" type="text" name="nome" placeholder="------"></h1>
            </div>
            <div class="history" id="history-div">
                <div class="title">
                    <h1>Texto:</h1>
                </div>
                <div class="input-history">
                    <pre name="historia" id="pre-history" contenteditable maxlength="12000" class="historyArea"></pre>
                    <textarea name="historia" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' id="textarea-history" maxlength="12000" class="historyArea"></textarea>
                </div>
            </div>
        </div>
    </div>
    <script>
        let inplace = ["<h1>", "</h1>", "<h2>", "</h2>"];
        let replace = ["*1", "/*1", "*2", "/*2"];

        function replaceT(text, repl, inpl){
            return text.replace(repl, inpl);
        }

        var hist = document.getElementById("history-div")
        hist.addEventListener("mouseleave", () => {
            var pre = document.getElementById('pre-history');

            var texta = document.getElementById('textarea-history');

            let texto = texta.value;

            for(var i = 0; i < inplace.length; i++){
                texto = replaceT(texto, replace[i], inplace[i]);
            }

            pre.innerHTML = texto;
        })
    </script>
</body>
</html>