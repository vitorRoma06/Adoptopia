<div class="post-animal flex-column">
    <img src="<?php echo $animal['imagem'] ?>" alt="<?php echo $animal['nome'] ?>" class="post-animal-img">
    <p class="post-animal-nome">
        <?php echo $animal['nome'] ?>
    </p>
    <p class="post-animal-descricao">
        <?php echo $animal['localizacao'] . " - " . $animal['cidade'] ?>
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
        <h1 class="titulo-box-vermais">Conheça <span class="nome-vermais">
                <?php echo $animal['nome'] ?>
            </span></h1>
        <div class="principal-conteudo-vermais flex-row">
            <img src="<?php echo $animal['imagem'] ?>" alt="<?php echo $animal['nome'] ?>" class="img-animal-vermais">
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
                    <?php echo $animal['localizacao'] . " - " . $animal['cidade'] ?>
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