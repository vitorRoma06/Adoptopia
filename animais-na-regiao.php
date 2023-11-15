<section class="swiper mySwiper animais-regiao flex-column align-itens j-content">
    <h1 class="titulos-paginas position-title-h1">Pets na sua região:</h1>
    <div class="swiper-wrapper conteudo-principal-animais-regiao flex-row j-content align-itens">

        <?php
        if (isset($_SESSION['id'])) {
            $sql = "SELECT * from 
                    animais as a
                    left join usuarios as u on (a.id_usuario = u.id) WHERE u.cidade = (SELECT cidade FROM usuarios WHERE id = {$_SESSION['id']}) limit 9";
            $stmt = $mysqli->prepare($sql);
            if ($stmt) {
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($animal = $result->fetch_assoc()) {
                        ?>
                        <div class="swiper-slide post-animal flex-column">
                            <img src="<?php echo $animal['imagem_pet'] ?>" alt="<?php echo $animal['nome_pet'] ?>"
                                class="post-animal-img">
                            <p class="post-animal-nome">
                                <?php echo $animal['nome_pet'] ?>
                            </p>
                            <p class="post-animal-descricao">
                                <?php echo $animal['bairro'] . " - " . $animal["cidade"] ?>
                            </p>
                            <img src="
                            <?php
                            if ($animal['sexo'] == 'M') {
                                echo "imgs/macho.png";
                            } else {
                                echo "imgs/femea.png";
                            }
                            ?>" alt="" class="post-animal-sexo">
                            <a href="quero-adotar.php">
                                <button class="post-animal-button">Ver mais</button>
                            </a>
                        </div>

                        <div class="main-popup-vermais flex-column j-content align-itens">
                            <div class="box-vermais flex-column">
                                <i class='bx bx-x close-vermais'></i>
                                <h1 class="titulo-box-vermais">Conheça o <span class="nome-vermais">
                                        <?php echo $animal['nome_pet'] ?>
                                    </span></h1>
                                <div class="principal-conteudo-vermais flex-row">
                                    <img src="<?php echo $animal['imagem_pet'] ?>" alt="<?php echo $animal['nome_pet'] ?>"
                                        class="img-animal-vermais">
                                    <div class="inf-animal-vermais flex-column">
                                        <p>Idade:
                                            <?php echo $animal['idade'] ?>
                                        </p>
                                        <p>Animal:
                                            <?php echo $animal['tipo_animal'] ?>
                                        </p>
                                        <p>Raça:
                                            <?php echo $animal['raca'] ?>
                                        </p>
                                        <p>Cor:
                                            <?php echo $animal['cor'] ?>
                                        </p>
                                        <p>Porte:
                                            <?php echo $animal['porte'] ?>
                                        </p>
                                        <p>Sexo:
                                            <?php echo $animal['sexo'] ?>
                                        </p>
                                        <p>Localização:
                                            <?php echo $animal['bairro'] . " - " . $animal["cidade"] ?>
                                        </p>
                                        <div class="status-vermais flex-column">
                                            <p>Status:</p>
                                            <div class="sts-vac-cas flex-row">
                                                <div class="sts-vac flex-row j-content align-itens">
                                                    <p>Vacinado</p>
                                                    <?php
                                                    if ($animal['vacinado'] == 'S') {
                                                        echo "<i class='bx bx-check' style='color:#4caf50'></i>";
                                                    } else {
                                                        echo "<i class='bx bx-x' style='color:#ff3d3d'></i>";
                                                    }
                                                    ?>
                                                </div>
                                                <div class="sts-cas flex-row j-content align-itens">
                                                    <p>Castrado</p>
                                                    <?php
                                                    if ($animal['castrado'] == 'S') {
                                                        echo "<i class='bx bx-check' style='color:#4caf50'></i>";
                                                    } else {
                                                        echo "<i class='bx bx-x' style='color:#ff3d3d'></i>";
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>
                                        <p>Descrição:
                                            <?php echo $animal['descricao'] ?>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>Nenhum animal disponível para adoção no momento.</p>';
                }
                $stmt->close();
            } else {
                echo '<p>Por enquanto não existem pets na sua região.</p>';
            }
            $mysqli->close();
        } else {
            ?>
            <div class="no-register flex-column align-itens">
            <p>Para que apareça animais da sua região:</p>
            <a href="cadastro.php"><button class="login-button bold" value="Cadastre-se">CADASTRE-SE</button></a>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="swiper-pagination"></div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 30,
      grabCursor: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

</script>