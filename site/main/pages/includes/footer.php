<link rel="stylesheet" href="../css/footer.css?v=1.01234<?php echo rand(0,10000)?>">
<footer>
    <div class="first-row">
        <div class="col_footer column-one">
            <h2>Leitores</h2>
            <p><a class="path-footer" href="central.php">Central</a></p>
            <p><a class="path-footer" href="loja.php">Loja</a></p>
        </div>
        <div class="col_footer column-two">
            <h2>Escritores</h2>
            <p><a class="path-footer" href="writerHub.php">Área do escritor</a></p>
            <p><a class="path-footer" href="criacao.php">Criação</a></p>
        </div>
        <div class="col_footer column-three">
            <h2>Pesquisa</h2>
            <form action="pesquisa.php" method="get">
                <input type="text" required name="busca" id="">
                <input id="submit-footer" type="submit" value="Pesquisar">
            </form>
        </div>
        <div class="col_footer column-four">
            <h2>Outros</h2>
            <a href="manual.php" class="go-all-up"><i class="far fa-sticky-note"></i></a>
            <a href="#" class="go-all-up"><i class="fa-solid fa-chevron-up"></i></a>
        </div>
    </div>
    <hr>
    <div class="copyright">
        <i class="fa-solid fa-copyright"></i>
    </div>
</footer>