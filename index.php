<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Adoptopia - Home</title>
</head>

<body>
    <header>
        <nav class="navigation">
            <a href="index.html" class="logo">
                <img src="imgs/logo-only.svg" alt="logo">
                <h1 class="text-logo">Adoptopia</h1>
            </a>
            <ul class="nav-menu">
                <li><a href="#"><i class='bx bx-help-circle'></i></a></li>
                <li><a href="#"><i class='bx bx-cog'></i></a></li>
                <li><a href="#"><i class='bx bx-bell'></i></a></li>
                <li><a href="logout.php"><i class='bx bx-exit'></i></a></li>
                <li class="nav-item"><a href="upload.php">Quero Doar</a></li>
                <li class="nav-item"><a href="teste.php">Quero Adotar</a></li>
                <?php if (!isset($_SESSION['id'])) {
                    ?>
                    <li class="nav-item"><a href="cadastro.php">Cadastrar</a></li>
                    <li class="nav-item"><a href="login.php">Entrar</a></li>
                <?php } else { ?>
                    <img src="imgs/dog-photo.png" class="foto-user">
                    <div class="sub-menu-wrap">
                        <div class="sub-menu">
                            <div class="user-info">
                                <img src="imgs/dog-photo.png" alt="foto-usuario">
                                <h3 class="bold">
                                    <?php echo $_SESSION['nome'] ?>
                                </h3>
                            </div>
                            <hr>
                            <a href="#" class="sub-menu-link flex-row align-itens">
                                <i class='bx bx-user'></i>
                                <p>Editar Perfil</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link flex-row align-itens">
                                <i class='bx bx-cog'></i>
                                <p>Configurações e Privacidade</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link flex-row align-itens">
                                <i class='bx bx-help-circle'></i>
                                <p>Ajuda</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link flex-row align-itens">
                                <i class='bx bx-exit'></i>
                                <p>Sair</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>

                <?php } ?>
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
    <main>
        <section class="slides">
            <!-- Conteúdo da sua página aqui -->
        </section>
    </main>
    <script src="js/responsive.js"></script>
</body>

</html>