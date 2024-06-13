<?php
session_start();

// Verificar se o usuário está logado como administrador
if (!isset($_SESSION['email']) || ($_SESSION['email'] !== 'admin@gmail.com' && $_SESSION['senha'] !== 'admin123')) {
    // Redirecionar para página de acesso negado
    header('Location: acesso_negado.php');
    exit();
}

// Incluir arquivo de configuração do banco de dados
include_once ('config.php');

// Consulta SQL para obter a lista de usuários
$sql = "SELECT * FROM usuarios ORDER BY id_usuario ASC";

$result = $conexao->query($sql);

// TESTANDO SE CHEGA OS RESULTADOS
//print_r($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url('wm1426ydowa81.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -120px;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            padding: 15px;
            color: bisque;
            text-align: center;
            background-image: linear-gradient(to right, rgba(72, 71, 12, 0.801), rgba(22, 74, 46, 0.736));
            margin-top: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        .button {
            max-width: 15%;
            display: block;
            margin-bottom: 10px;
            padding: 10px 20px;
            background-color: #135211;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0c7711;
        }

        .voltarAdmin {
            position: absolute;
            top: 200px;
            left: 20px;
            text-align: center;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 45%;
        }
        h3{
            color: red;
            text-decoration: none;
            margin-top: -5px;
            
        }
        a{
            text-decoration: none;

        }
        

    </style>
</head>

<body>
    <H1>Bem Vindo Admin!</H1>
    <form action="testeLogin.php" method="POST">
        <div class="box">
            <div class="content">

                <a class="button" href="exibirUsuarios.php">Informações Usuários</a>

                <a class="button" href="cadastroProdutos.php">Adicionar Produto</a>
            </div>
        </div>
        <div class="voltarAdmin">
            <a href="formularioLogin.php">
                <img src="Assets\img\caraCorrendo.gif" alt="gif">
                <h3>Voltar</h3>
            </a>
        </div>
    </form>

</body>

</html>