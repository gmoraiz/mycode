<header class="row black" style="background-color:#333">
    <div class="medium-12 columns">
        <div class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name"><h1><a href="#">Teste FactorBS</a></h1></li>
                <li class="toggle-topbar menu-icon"><a href="#">Categorias</a></li>
            </ul>
            <nav class="top-bar-section">
            <ul class="right">
                <li class="active"><a href="https://php-gmoraiz.c9users.io/projeto">Noticias</a></li>
            <?php if ($sessao) : ?>
                <li><a href="https://php-gmoraiz.c9users.io/projeto/categoria">Categorias</a></li>
                <li><a href="https://php-gmoraiz.c9users.io/projeto/deslogar">Sair</a></li>
            </ul>
            <ul class="left"><li><a href="#">Bem vindo, <?= $nome ?>!</a></li></ul>
            </ul>
            <?php else : ?>
                <li><a href="https://php-gmoraiz.c9users.io/projeto/login">Área Restrita</a></li>
            </ul>
            <?php endif; ?>
            </nav>
        </div>
    </div>
    </div>
</header>