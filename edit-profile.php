<?php

include 'conexao.php';
session_start();
$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $update_name = mysqli_real_escape_string($mysqli, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($mysqli, $_POST['update_email']);

    mysqli_query($mysqli, "UPDATE usuarios SET nome = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
    $_SESSION['nome'] = $update_name;

    $old_pass = $_POST['old_pass'];
    $update_pass = $_POST['update_pass'];
    $new_pass = $_POST['new_pass'];

    if (!empty($update_pass) || !empty($new_pass)) {
        if ($update_pass != $old_pass) {
            $message[] = 'Senha antiga incorreta!';
        } else {
            mysqli_query($mysqli, "UPDATE usuarios SET senha = '$new_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'Senha atualizada com sucesso!';
        }
    }

    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploads/' . $update_image;

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Imagem muito grande';
        } else {
            $image_update_query = mysqli_query($mysqli, "UPDATE usuarios SET imagem = '$update_image' WHERE id = '$user_id'") or die('query failed');
            if ($image_update_query) {
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'Imagem atualizada com sucesso!';
            $_SESSION['imagem'] = $update_image;
        }
    }

}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Adoptopia</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/user.css">

</head>

<body>

    <div class="update-profile">

        <?php
        $select = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
            if ($fetch['imagem'] == '') {
                echo '<img src="images/default-avatar.png">';
            } else {
                echo '<img src="uploads/' . $fetch['imagem'] . '">';
            }
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <div class="flex">
                <div class="inputBox">
                    <span>Nome :</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['nome']; ?>" class="box">
                    <span>Email :</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                    <span>Atualize sua foto :</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['senha']; ?>">
                    <span>Senha antiga :</span>
                    <input type="password" name="update_pass" placeholder="Digite sua senha antiga" class="box">
                    <span>Nova senha :</span>
                    <input type="password" name="new_pass" placeholder="Digite sua nova senha" class="box">
                </div>
            </div>

            <input type="submit" value="Atualizar Perfil" name="update_profile" class="btn" onclick="alertI()">
            <a href="index.php" class="delete-btn">Voltar</a>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function alertI() {
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
    </script>
</body>

</html>