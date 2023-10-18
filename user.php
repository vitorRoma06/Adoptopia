<?php if (!isset($_SESSION['id'])) {
    ?>
    <li class="nav-item"><a href="cadastro.php">Cadastrar</a></li>
    <li class="nav-item"><a href="login.php">Entrar</a></li>
<?php } else {
    $nomeCompleto = $_SESSION['nome'];
    $primeiroNome = explode(' ', $nomeCompleto)[0]; ?>
    <img class="foto-user" src="<?php echo "uploads/" . $_SESSION['imagem']?>" onclick="toggleMenu()">
    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img class="foto-user" src="<?php echo "uploads/" . $_SESSION['imagem']?>">
                <h3 class="bold">
                    <?php echo $primeiroNome ?>
                </h3>   
            </div>
            <hr>
            <a href="edit-profile.php" class="sub-menu-link flex-row align-itens">
                <i class='bx bx-user'></i>
                <p>Editar Perfil</p>
                <span>></span>
            </a>
            <!-- <a href="#" class="sub-menu-link flex-row align-itens">
                <i class='bx bx-cog'></i>
                <p>Configurações e Privacidade</p>
                <span>></span>
            </a> -->
            <a href="perguntas.php" class="sub-menu-link flex-row align-itens">
                <i class='bx bx-help-circle'></i>
                <p>Ajuda</p>
                <span>></span>
            </a>
            <a href="logout.php" class="sub-menu-link flex-row align-itens">
                <i class='bx bx-exit'></i>
                <p>Sair</p>
                <span>></span>
            </a>
        </div>
    </div>

<?php } ?>