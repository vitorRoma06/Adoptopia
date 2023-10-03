<header>
    <nav class="navigation">
        <a href="index.php" class="logo">
            <img src="imgs/logo-only.svg" alt="logo">
            <h1 class="text-logo">Adoptopia</h1>
        </a>
        <ul class="nav-menu">
            <li><a href="perguntas.html"><i class='bx bx-help-circle'></i></a></li>
            <li><a href="configuracoes.html"><i class='bx bx-cog'></i></a></li>
            <li><a href="#"><i class='bx bx-bell'></i></a></li>
            <li class="nav-item"><a href="quero-doar.php">Quero Doar</a></li>
            <li class="nav-item"><a href="quero-adotar.php">Quero Adotar</a></li>
            <?php include 'user.php' ?>
        </ul>
        <input type="checkbox" id="checkbox">
        <label onclick="menuShow()" for="checkbox" class="toggle">
            <div class="bar bar--top"></div>
            <div class="bar bar--middle"></div>
            <div class="bar bar--bottom"></div>
        </label>

    </nav>
    <div class="mobile-menu">
        <ul class="nav-menu">
            <li class="nav-item"><a href="teste.php">Quero Doar</a></li>
            <li class="nav-item"><a href="#">Quero Adotar</a></li>
            <li class="nav-item"><a href="#">Configurações</a></li>
            <li class="nav-item"><a href="#">Notificações</a></li>
            <li class="nav-item"><a href="login.php">Entrar</a></li>
            <li class="nav-item"><a href="cadastro.php">Cadastrar</a></li>
            <li class="nav-item"><a href="#">Ajuda</a></li>
        </ul>
    </div>
</header>