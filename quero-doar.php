<?php
if (!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])){
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'conexao.php';

    try {
        $nome_pet = $_POST['nome'];
        $idade_pet = $_POST['idade'];
        $tipo_pet = $_POST['tipo-animal'];
        $raca_pet = $_POST['raca'];
        $cor_pet = $_POST['cor'];
        $porte_pet = $_POST['porte'];
        $sexo_pet = $_POST['radio-group-sexo'];
        $vacinado_pet = $_POST['radio-group-vacinado'];
        $castrado_pet = $_POST['radio-group-castrado'];
        $patologia_pet = $_POST['patologia'];
        $cidade_pet = $_POST['cidade'];
        $localizacao_pet = $_POST['local-bairro'];
        $descricao_pet = $_POST['descricao'];


        if (isset($_FILES['imagem_pet'])) {
            $imagem_pet = $_FILES['imagem_pet']['name'];
            $imagem_pet_size = $_FILES['imagem_pet']['size'];
            $imagem_pet_tmp_name = $_FILES['imagem_pet']['tmp_name'];
            $imagem_pet_folder = 'uploads/' . $imagem_pet;
        } else {
            $message[] = 'Imagem não fornecida';
        }


        if (!empty($imagem_pet)) {
            if ($imagem_pet_size > 2000000) {
                $message[] = 'Imagem muito grande';
            } else {
                move_uploaded_file($imagem_pet_tmp_name, $imagem_pet_folder);
                $query_animais = "INSERT INTO animais (nome, idade, tipo_animal, raca, cor, porte, sexo, vacinado, castrado, patologia, cidade, localizacao, descricao, data_cadastro, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

                $stmt = $mysqli->prepare($query_animais);
                $stmt->bind_param("ssssssssssssss", $nome_pet, $idade_pet, $tipo_pet, $raca_pet, $cor_pet, $porte_pet, $sexo_pet, $vacinado_pet, $castrado_pet, $patologia_pet, $cidade_pet, $localizacao_pet, $descricao_pet, $imagem_pet_folder);
                $stmt->execute();

                header('Location: quero-adotar.php');
                exit();
            }
        }
    } catch (PDOException $e) {
        echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    }


}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>
<title>Quero Doar - Adoptopia</title>

<body>
    <?php include 'header.php' ?>
    <main class="main-quero-adotar">

        <form class="form-adotar" action="quero-doar.php" method="POST" enctype="multipart/form-data">
            <h1 class="title-form bold">Cadastrar Pet</h1>
            <div class="conteudo-form-adotar flex-row">
                <div class="column-form-adotar div-inputs-adotar flex-column">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required
                        oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                    <label for="idade">Idade:</label>
                    <input type="number" name="idade" required min="0" max="32">

                    <label for="tipo-animal">Tipo de Animal:</label>

                    <select name="tipo-animal" id="tipo-animal">
                        <option value="">Escolha uma opção:</option>
                        <option value="Cachorro">Cachorro</option>
                        <option value="Gato">Gato</option>
                    </select>


                    <label for="raca">Raça:</label>
                    <input type="text" name="raca" required
                        oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                    <label for="cor">Cor:</label>
                    <input type="text" name="cor" required
                        oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">


                    <label for="porte">Porte:</label>
                    <select name="porte" id="porte">
                        <option value="">Escolha uma opção:</option>
                        <option value="Mini">Mini</option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                        <option value="Gigante">Gigante</option>
                    </select>
                </div>
                <div class="column-form-adotar div-inputs-adotar flex-column">

                    <div class="radio-button-container">
                        <label for="sexo">Sexo:</label>
                        <div class="radio-button">
                            <input type="radio" class="radio-button__input" id="macho" name="radio-group-sexo"
                                value="Macho">
                            <label class="radio-button__label" for="macho">
                                <span class="radio-button__custom radio-vacinado"></span>
                                Macho
                            </label>
                        </div>
                        <div class="radio-button">
                            <input type="radio" class="radio-button__input" id="fêmea" name="radio-group-sexo"
                                value="Fêmea">
                            <label class="radio-button__label" for="fêmea">
                                <span class="radio-button__custom" radio-vacinado></span>
                                Fêmea
                            </label>
                        </div>
                    </div>

                    <div class="radio-button-container">
                        <label for="vacinado">Vacinado:</label>
                        <div class="radio-button">
                            <input type="radio" class="radio-button__input" id="sim" name="radio-group-vacinado"
                                value="Sim">
                            <label class="radio-button__label" for="sim">
                                <span class="radio-button__custom"></span>
                                Sim
                            </label>
                        </div>
                        <div class="radio-button">
                            <input type="radio" class="radio-button__input" id="nao" name="radio-group-vacinado"
                                value="Não">
                            <label class="radio-button__label" for="nao">
                                <span class="radio-button__custom"></span>
                                Não
                            </label>
                        </div>
                    </div>

                    <div class="radio-button-container">
                        <label for="castrado">Castrado:</label>
                        <div class="radio-button">
                            <input type="radio" class="radio-button__input" id="sim2" name="radio-group-castrado"
                                value="Sim">
                            <label class="radio-button__label" for="sim2">
                                <span class="radio-button__custom"></span>
                                Sim
                            </label>
                        </div>
                        <div class="radio-button">
                            <input type="radio" class="radio-button__input" id="nao2" name="radio-group-castrado"
                                value="Não">
                            <label class="radio-button__label" for="nao2">
                                <span class="radio-button__custom"></span>
                                Não
                            </label>
                        </div>
                    </div>

                    <label for="patologia">Patologia:</label>
                    <input type="text" name="patologia">
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade">
                    <label for="local-bairro">Localização(Bairro):</label>
                    <input type="text" name="local-bairro">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" required></textarea>

                    <input type="file" name="imagem_pet" accept="image/jpg, image/jpeg, image/png">
                </div>
            </div>
            <input class="submit-button bold" type="submit" value="ENVIAR">
        </form>

        <script src="js/responsive.js"></script>
        <script src="js/user-profile.js"></script>
        <script src="js/selects-form.js"></script>
    </main>

</body>

</html>