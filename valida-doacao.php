<?php
session_start();
include("conexao.php");
$animal_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {


        // if (isset($_FILES['arquivo'])) {
        //     $arquivo = $_FILES['arquivo'];
        //     if ($arquivo['error']) {
        //         die("Falha ao enviar arquivo");
        //     }

        //     $nomeDoArquivo = $_FILES['arquivo']['name'];
        //     $tamanhoDoArquivo = $_FILES['arquivo']['size'];
        //     $extensaoDoArquivo = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        //     if ($tamanhoDoArquivo <= 2 * 1024 * 1024) {
        //         if ($extensaoDoArquivo === 'jpg' || $extensaoDoArquivo === 'png') {
        //             // Diretório de destino para o upload
        //             $diretorioDestino = 'uploads/';

        //             // Gere um nome único para o arquivo
        //             $novoNomeDoArquivo = uniqid() . '.' . $extensaoDoArquivo;

        //             $path = $diretorioDestino . $novoNomeDoArquivo;

        //             $deu_certo = move_uploaded_file($_FILES['arquivo']['tmp_name'], $path);

        //             if ($deu_certo) {
        //                 // Inserir informações na tabela animais
        //                 $sql = "INSERT INTO animais (idade, raca, nome, cor, porte, sexo, vacinado, castrado, patologia, situacao, status, descricao, nomeArquivo, path, created_at)
        //                         VALUES ('$idade', '$raca', '$nome', '$cor', '$porte', '$sexo', '$vacinado', '$castrado', '$patologia', '$situacao', '$status', '$descricao', '$novoNomeDoArquivo', '$path', NOW())";

        //                 if ($mysqli->query($sql) === TRUE) {
        //                     echo "<p>Animal inserido com sucesso!</p>";
        //                 } else {
        //                     echo "Erro ao inserir animal: " . $mysqli->error;
        //                 }
        //             } else {
        //                 echo 'Erro ao fazer upload do arquivo.';
        //             }
        //         } else {
        //             echo 'Tipo de arquivo não aceito. Apenas arquivos JPG e PNG são permitidos.';
        //         }
        //     } else {
        //         echo 'O tamanho do arquivo excede 2 MB.';
        //     }
        // }
        $nome_pet = $_POST['nome'];
        $idade_pet = $_POST['idade'];
        $raca_pet = $_POST['raca'];
        $cor_pet = $_POST['cor'];
        $porte_pet = $_POST['porte'];
        $sexo_pet = $_POST['sexo'];
        $vacinado_pet = $_POST['vacinado'];
        $castrado_pet = $_POST['castrado'];
        $patologia_pet = $_POST['patologia'];
        $situacao_pet = $_POST['situacao'];
        $status_pet = $_POST['status'];
        $descricao_pet = $_POST['descricao'];


        $imagem_pet = $_FILES['arquivo']['name'];
        $imagem_pet_size = $_FILES['arquivo']['size'];
        $imagem_pet_tmp_name = $_FILES['arquivo']['tmp_name'];
        $imagem_pet_folder = 'uploads/' . $imagem_pet;
        
        if (!empty($imagem_pet)) {
            if ($imagem_pet_size > 2000000) {
                $message[] = 'Imagem muito grande';
            } else {
                move_uploaded_file($imagem_pet_tmp_name, $imagem_pet_folder);
                $query_animais = "INSERT INTO animais (nome, idade, raca, cor, porte, sexo, vacinado, castrado, patologia, situacao, descricao, data_cadastro, imagem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

                $stmt = $mysqli->prepare($query_animais);
                $stmt->bind_param("ssssssssssss", $nome_pet, $idade_pet, $raca_pet, $cor_pet, $porte_pet, $sexo_pet, $vacinado_pet, $castrado_pet, $patologia_pet, $situacao_pet, $descricao_pet, $imagem_pet_folder);
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