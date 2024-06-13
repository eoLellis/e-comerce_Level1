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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/c2/b8/cd/c2b8cdd24376f626de20e8684eb1e431.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -80px;
        }

        .usuarios {
            border: 3px solid darkblue;
            border-radius: 15px;
            background-color: rgba(41, 21, 55, 0.755);
            margin-top: 15px;
        }

        .voltarAdmin {
            position: absolute;
            text-align: center;
            margin-top: 15px;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 100%;
        }

        h3 {
            color: darkslateblue;
            border: none;
            margin-top: -5px;

        }
    </style>
</head>

<body>
<div class="voltarAdmin">
            <a href="admin.php" class="btn btn-primary">Voltar para Admin</a>
    <div class="usuarios">

        <table class="table table-striped table-bordered" style="background-color: #f8f9fa; color: #000;">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Telefone</th>
                    <th scope="col" class="text-center">Sexo</th>
                    <th scope="col" class="text-center">Data de Nascimento</th>
                    <th scope="col" class="text-center">Endereço</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Editar/Excluir</th>
                </tr>
            </thead>

            <tbody class="table-dark">
                <?php

                while ($user_data = mysqli_fetch_assoc($result)) {

                    echo "<tr>";
                    echo "<td>" . $user_data['id_usuario'] . "</td>";
                    echo "<td>" . $user_data['nome'] . "</td>";
                    echo "<td>" . $user_data['email'] . "</td>";
                    echo "<td>" . $user_data['telefone'] . "</td>";
                    echo "<td>" . $user_data['sexo'] . "</td>";
                    echo "<td>" . $user_data['data_nasc'] . "</td>";
                    echo "<td>" . $user_data['endereco'] . "</td>";
                    echo "<td>" . $user_data['estado'] . "</td>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='editar_usuario.php?id=$user_data[id_usuario]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                </svg>
                                    </a>
                                    <a class='btn btn-sm btn-danger' href='excluirUsuario.php?id=$user_data[id_usuario]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                                    </svg>
                                                                    </td>";

                    echo "</tr>";

                }
                ?>
            </tbody>
        </table>

    </div>


</body>

</html>