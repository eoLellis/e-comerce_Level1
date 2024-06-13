<?php
session_start();
//print_r($_SESSION);

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    //Se email e senha não estiverem definidos roda o if

    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    //Se cair no if Destrói as informações de email e senha

    header('Location: formularioLogin.php');
    exit();

}

include_once ('config.php');
//faz a conexão com o Banco de Dados

$email = $_SESSION['email'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conexao->query($sql);
//Consulta no banco de dados TODOS OS DADOS do email que foi criado pelo usuário

if ($result->num_rows > 0) {

    // Extrair os dados do usuário

    $usuario = $result->fetch_assoc();
    // obtem uma linha de resultado como um array associativo.
    //ou seja obtem sempre a proxima linha do $result e guarda no $usuario
    //ex: nome, email, telefone, sexo...  ...estado;

} else {

    // Caso nenhum usuário seja encontrado, redirecione para o formulário de login
    header('Location: formularioLogin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema | Level 1</title>
    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/c2/b8/cd/c2b8cdd24376f626de20e8684eb1e431.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background- ition: center -80px;
        }

        h1 {
            text-align: center;
            /* Centraliza o texto horizontalmente */
            font-size: 2em;
            /* Tamanho da fonte */
            color: whitesmoke;
            /* Cor do texto */
        }

        .info {
            width: 20%;
            padding: 10px;
            border-radius: 9px;
            color: rgb(20, 20, 20);
            background-color: rgba(122, 196, 213, 0.7);
            font-weight: bold;
            font-size: 26px;
            text-align: left;
            border: 3px solid mediumaquamarine;
            margin-top: -50px;

        }

        p {
            padding: 15px;
            display: block;
            margin-left: 50px;
            /* Alterado para inline-block */
            background-color: rgba(0, 0, 0, 0.7);
            color: whitesmoke;
            max-width: 16%;
            word-wrap: break-word;
            /* Evita que o texto saia da caixa */
            border-radius: 7px;
            border: 3px solid royalblue;
        }

        .gif {
            text-align: center;
            margin-top: 20px;
        }

        .gif img {
            width: 80px;
            height: 70px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <h1>Você Acessou o Sistema! ☁️</h1>
    <div class="gif">

        <a href="home.php">
            <img src="nuvem.gif" alt="gif">

        </a>
    </div>
    <div class="container">
        <div class="info">📝 Informações: </div>
        <p><strong>Nome:</strong>
            <?php echo $usuario['nome']; ?>
        </p>
        <p><strong>Email:</strong>
            <?php echo $usuario['email']; ?>
        </p>
        <p><strong>Telefone:</strong>
            <?php echo $usuario['telefone']; ?>
        </p>
        <p><strong>Sexo:</strong>
            <?php echo $usuario['sexo']; ?>
        </p>
        <p><strong>Data de Nascimento:</strong>
            <?php echo $usuario['data_nasc']; ?>
        </p>
        <p><strong>Endereço:</strong>
            <?php echo $usuario['endereco']; ?>
        </p>
        <p><strong>Estado:</strong>
            <?php echo $usuario['estado']; ?>
        </p>
    </div>

</body>

</html>