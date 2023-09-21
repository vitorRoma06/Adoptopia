<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexao.php");

    // Coletar dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $telefone = $_POST["telefone"];
    
    // Coletar a data de nascimento no formato dd/mm/yyyy
    $data_nascimento = $_POST["data_nascimento"];

    // Inserir dados na tabela usuarios
    $query_usuarios = "INSERT INTO usuarios (nome, email, senha, estado, cidade, telefone, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexao->prepare($query_usuarios);
    $stmt->bind_param("sssssss", $nome, $email, $senha, $estado, $cidade, $telefone, $data_nascimento);
    
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso";
        exit; // linha para interromper a execução do código aqui
    } else {
        echo "Erro: " . $stmt->error;
    }

    //A DATA NÃO ESTÁ SENDO SALVA NO FORMATO PADRÃO BRASILEIRO DIA/MÊS/ANO

    $query_usuario = "SELECT id, email, DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data_formatada, data_nascimento FROM usuarios";
    
    $result_usuario = $conexao->query($query_usuario);

    if ($result_usuario) {
        while ($row_notification = $result_usuario->fetch_assoc()) {
            var_dump($row_notification);
        }
    } else {
        echo "Erro na consulta de notificações: " . $conexao->error;
    }

    $conexao->close();
}
?>
