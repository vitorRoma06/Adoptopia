<?php
session_start();
include 'conexao.php';

$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $update_name = mysqli_real_escape_string($mysqli, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($mysqli, $_POST['update_email']);


    if ($update_name != $_SESSION['nome']) {
        if (strlen($update_name) < 3) {
            $message[] = array("msg" => "Nome : mínimo 3 caracteres!", "type" => "error");
        } else {
            $message[] = array("msg" => "Nome alterado com sucesso!", "type" => "success");
        }
    }

    if ($update_email != $_SESSION['email']) {
        if (!filter_var($update_email, FILTER_VALIDATE_EMAIL)) {
            $message[] = array("msg" => "E-mail inválido.", "type" => "error");
        } else {
            $message[] = array("msg" => "Email alterado com sucesso!", "type" => "success");
        }
    }
    mysqli_query($mysqli, "UPDATE usuarios SET nome = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
    $_SESSION['nome'] = $update_name;
    $_SESSION['email'] = $update_email;

    $old_pass = $_POST['old_pass'];
    $update_pass = $_POST['update_pass'];
    $new_pass = $_POST['new_pass'];

    $select = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }

    $old_pass_hash = $_SESSION['senha'];
    if (!empty($update_pass) || !empty($new_pass)) {
        if (!password_verify($update_pass, $old_pass_hash)) {
            $message[] = array("msg" => "Senha antiga incorreta!", "type" => "error");
        } else if ($update_pass == $new_pass) {
            $message[] = array("msg" => "Use uma senha diferente!", "type" => "error");
        } else if (strlen($new_pass) < 16) {
            $message[] = array("msg" => "Senha: mínimo 16 caracteres!", "type" => "error");
        } else {
            $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            mysqli_query($mysqli, "UPDATE usuarios SET senha = '$new_pass' WHERE id = '$user_id'") or die('query failed');
            $_SESSION['senha'] = $new_pass;
            $message[] = array("msg" => "Senha alterada com sucesso!", "type" => "success");
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploads/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = array("msg" => 'Imagem muito grande', "type" => "error");
        } else {
            $image_update_query = mysqli_query($mysqli, "UPDATE usuarios SET imagem = '$update_image' WHERE id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = array("msg" => "Imagem atualizada com sucesso!", "type" => "success");
            $_SESSION['imagem'] = $update_image;
        }
    }

}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Adoptopia</title>
    <link rel="icon" type="image/x-icon" href="imgs/logo-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/user.css">


</head>

<body>

    <div class="update-profile">

        <?php

        ?>

        <form action="edit-profile.php" method="post" enctype="multipart/form-data">
            <?php
            if ($_SESSION['imagem'] == '') {
                echo '<img class="foto-user" src="uploads/default.png">';
            } else {
                echo '<img class="foto-user" src="uploads/' . $_SESSION['imagem'] . '">';
            }
            if (isset($message)) {
                foreach ($message as $msg) {
                    $class = ($msg["type"] == "success") ? "msg-true" : "msg-false";
                    echo '<div class="message ' . $class . '">' . $msg["msg"] . '</div>';
                }
            }

            ?>
            <div class="flex">
                <div class="inputBox">
                    <input type="text" name="update_name" value="<?php echo $_SESSION['nome']; ?>" class="box">
                    <input type="email" name="update_email" value="<?php echo $_SESSION['email']; ?>" class="box">
                    <input type="hidden" name="old_pass" value="<?php echo $_SESSION['senha']; ?>">
                    <input type="password" name="update_pass" placeholder="Digite sua senha antiga" class="box">
                    <input type="password" name="new_pass" placeholder="Digite sua nova senha" class="box">
                    <span class="margin-topadd">Atualize sua foto :</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
            </div>

            <input type="submit" value="Atualizar Perfil" name="update_profile" class="btn">
            <a href="index.php" class="delete-btn">Voltar</a>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="js/validacao-senha-editar-perfil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>