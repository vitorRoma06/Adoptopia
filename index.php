<?php
session_start();
include("conexao.php");
include("validacao-filtros.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<title>Home - Adoptopia</title>

<body>
    <?php include 'header.php' ?>
    <main class="main-index flex-column j-content align-itens">
        <?php include 'slides.php' ?>


        <section class="swiper mySwiper animais-regiao flex-column j-content">
            <h1 class="titulos-paginas">Pets na região:</h1>
            <div class="swiper-wrapper conteudo-principal-animais-regiao flex-row j-content">

                <?php
                $sql = "SELECT a.*
                FROM animais AS a
                INNER JOIN usuarios AS u ON a.localização = u.cidade LIMIT 9";
                $stmt = $mysqli->prepare($sql);
                if ($stmt) {
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($animal = $result->fetch_assoc()) {
                            ?>
                            <div class="swiper-slide post-animal flex-column">
                                <img src="<?php echo $animal['imagem'] ?>" alt="<?php echo $animal['nome'] ?>"
                                    class="post-animal-img">
                                <p class="post-animal-nome">
                                    <?php echo $animal['nome'] ?>
                                </p>
                                <p class="post-animal-descricao">
                                    <?php echo $animal['localização'] ?>
                                </p>
                                <img src="
                            <?php
                            if ($animal['sexo'] == 'M') {
                                echo "imgs/macho.png";
                            } else {
                                echo "imgs/femea.png";
                            }
                            ?>" alt="" class="post-animal-sexo">
                                <button id="button-vermais" class="post-animal-button">Ver mais</button>
                            </div>

                            <div class="main-popup-vermais flex-column j-content align-itens">
                                <div class="box-vermais flex-column">
                                    <i class='bx bx-x close-vermais'></i>
                                    <h1 class="titulo-box-vermais">Conheça o <span class="nome-vermais">
                                            <?php echo $animal['nome'] ?>
                                        </span></h1>
                                    <div class="principal-conteudo-vermais flex-row">
                                        <img src="<?php echo $animal['imagem'] ?>" alt="<?php echo $animal['nome'] ?>"
                                            class="img-animal-vermais">
                                        <div class="inf-animal-vermais flex-column">
                                            <p>Idade:
                                                <?php echo $animal['idade'] ?>
                                            </p>
                                            <p>Animal:
                                                <?php echo $animal['tipo_animal'] ?>
                                            </p>
                                            <p>Raça:
                                                <?php echo $animal['raça'] ?>
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
                                                <?php echo $animal['localização'] ?>
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
                                                <?php echo $animal['descrição'] ?>
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
                    echo '<p>Ocorreu um erro ao buscar os animais disponíveis.</p>';
                }
                $mysqli->close();

                ?>
            </div>
            <div class="swiper-pagination"></div>
        </section>
    </main>
    <script src="js/ver-mais-quero-adotar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 60,
                stretch: 0,
                depth: 70,
                modifier: 1,
                slideShadows: true,
            },
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

        });

    </script>
    <?php include 'scripts.php' ?>
</body>

</html>