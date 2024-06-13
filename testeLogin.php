<?php
session_start();

// Verificar se o tipo for submit e os campos de email e senha não estiverem vazios
if (isset($_POST["submit"]) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once ('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) == 1) {
        // Login bem-sucedido

        // Armazenar as informações do usuário na sessão
        $usuario = $result->fetch_assoc();
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['senha'] = $usuario['senha'];

        // Verificar se o usuário é um administrador
        if ($_SESSION['email'] === 'admin@gmail.com' && $_SESSION['senha'] === 'admin123') {
            // Redirecionar para a página de administração
            header('Location: admin.php');
        } else {
            // Redirecionar para a página principal da loja
            header('Location: lojaLevel1.php');
        }
    } else {
        // Login inválido, redirecionar de volta para o formulário de login
        header('Location: formularioLogin.php');
    }
} else {
    // Os campos de email e senha não foram submetidos, redirecionar para o formulário de login
    header('Location: formulariologin.php');
}
?>
