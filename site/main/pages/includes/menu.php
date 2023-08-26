<div id="all-menu" class="all_menu disappear">
    <div id="chevron-menu" class="close-menu chevron-phases" onclick="menu_appear()">
        <i class="fa-sharp fa-solid fa-xmark"></i>
    </div>
    <div id="menu" class="menu off">
        <div class="lamp">
            <div class="wire">
                
            </div>
            <i onclick="switchMenu(1)" class="fa-solid fa-lightbulb"></i>
        </div>
        <div class="lamp-area" onclick="switchMenu(2)">
        </div> 
        <div class="content">
            <ul>
                <li><a href="central.php" rel="noopener noreferrer">Central</a></li>
                <li><a href="profile.php?profile=<?php echo $perfilEntrando?>" rel="noopener noreferrer">Perfil</a></li>
                <li><a href="loja.php" rel="noopener noreferrer">Loja</a></li>
                <li><a href="writerHub.php" rel="noopener noreferrer">Criação</a></li>
                <li><a href="leave.php" rel="noopener noreferrer">Sair</a></li>
                <div class="search-menu">
                    <form action="pesquisa.php" method="get">
                        <div class="search-box">
                            <button class="btn-search"><i class="fas fa-search"></i></button>
                            <input required type="text" name="busca" class="input-search" placeholder="Pesquisar história........">
                        </div>
                    </form>
                </div>
            </ul>
        </div>
    </div>
</div>