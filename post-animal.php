<div class="post-animal flex-column">
    <img src="<?php echo $animal['imagem_pet'] ?>" alt="<?php echo $animal['nome_pet'] ?>" class="post-animal-img">
    <p class="post-animal-nome">
        <?php echo $animal['nome_pet'] ?>
    </p>
    <p class="post-animal-descricao">
        <?php echo $animal['cidade'] . " - " . $animal['bairro'] ?>
    </p>
    <img src="<?php echo imagemSexo($animal); ?>" alt="imagem-sexo-animal" class="post-animal-sexo">
    <button class="post-animal-button">Ver mais</button>
</div>

<div class="main-popup-vermais flex-column j-content align-itens">
    <div class="box-vermais flex-row">
        <i class='bx bx-x close-vermais'></i>
        <div class="principal-conteudo-vermais flex-row">
            <div class="secao-img-local flex-column j-content align-itens">
                <img src="<?php echo $animal['imagem_pet'] ?>" alt="<?php echo $animal['nome_pet'] ?>"
                    class="img-animal-vermais">
                <p class="localizacao-vermais flex-row"><i class='bx bxs-map-pin'></i>
                    <?php echo "Cidade: " . $animal['cidade'] . "<br>Bairro: " . $animal['bairro'] ?>
                </p>
            </div>
            <hr class="hr-vermais">
            <div class="secao-inf-button flex-column align-itens">
                <div class="inf-animal-vermais flex-column">
                    <h1 class="titulo-animal-vermais">
                        <p>
                            <?php echo $animal['nome_pet'] . ' | ' . $animal['idade'] . ' | ' . $animal['sexo'] ?>
                        </p>
                    </h1>
                    <p><span class="titulo-classes-vermais">Raça:</span>
                        <?php echo $animal['raca'] ?>
                    </p>
                    <p><span class="titulo-classes-vermais">Cor:</span>
                        <?php echo $animal['cor'] ?>
                    </p>
                    <p><span class="titulo-classes-vermais">Porte:</span>
                        <?php echo $animal['porte'] ?>
                    </p>
                    <p><span class="titulo-classes-vermais">Vacinado:</span>
                        <?php echo $animal['vacinado'] ?>
                    </p>
                    <p><span class="titulo-classes-vermais">Castrado:</span>
                        <?php echo $animal['castrado'] ?>
                    </p>
                    <p><span class="titulo-classes-vermais">Patologia:</span>
                        <?php echo $animal['patologia'] ?>
                    </p>
                    <p><span class="titulo-classes-vermais">Descrição:</span>
                        <?php echo $animal['descricao'] ?>
                    </p>
                </div>
                <button class="quero-adotar-button">Quero Adotar</button>
            </div>

        </div>
    </div>
</div>
<div class="main-popup-adotar flex-column j-content align-itens">
    <div class="box-quero-adotar-button">
        <i class='bx bx-x close-vermais'></i>
        <h1>Contato:</h1>
        <p><span>E-mail:</span>
            <?php echo $animal['id_usuario'] ?>

        </p>
        <p><span>Número:</span>
            <?php echo $animal['telefone'] ?>
        </p>
    </div>
</div>