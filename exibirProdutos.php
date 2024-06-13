<?php
    session_start();

    // Verificar se o usuário está logado como administrador
    if (!isset($_SESSION['email']) || ($_SESSION['email'] !== 'admin@gmail.com' && $_SESSION['senha'] !== 'admin123')) {
        // Redirecionar para página de acesso negado
        header('Location: formularioLogin.php');
        exit();
    }

    // Incluir arquivo de configuração do banco de dados
    include_once ('config.php');

    // Consulta SQL para obter a lista de usuários
    $sql = "SELECT * FROM produtos ORDER BY id_produtos ASC";

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
    <style>
        body{
            background-image: linear-gradient(to right, rgba(23, 91, 109, 0.807),rgba(4, 124, 80, 0.867));
            padding: 79px 90px;
        }
        tbody{
            text-align: center;
        }
    </style>
</head>
<a href="admin.php" class="btn btn-primary">Voltar para Admin</a>
    <div class="usuarios">
<body>
    <div class="usuarios">
    <table class="table table-striped table-bordered" style="background-color: #f8f9fa; color: #000;">
    <thead class="table-dark">
    <tr>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">Nome</th>
        <th scope="col" class="text-center">Preco</th>
        <th scope="col" class="text-center">Imagem</th>
        <th scope="col" class="text-center">Editar/Excluir</th>

    </tr>
</thead>


            <tbody class="table-dark">
            <?php
                    
                    while ($user_data = mysqli_fetch_assoc($result)) {

                        echo "<tr>";
                        echo "<td>" . $user_data['id_produtos'] . "</td>";
                        echo "<td>" . $user_data['nome_produto'] . "</td>";
                        echo "<td>" . $user_data['preco'] . "</td>";
                        echo "<td>" . $user_data['imagem_produto'] . "</td>";   
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='editar_produto.php?id=$user_data[id_produtos]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                                </svg>
                                    </a>
                                    <a class='btn btn-sm btn-danger' href='excluirProduto.php?id=$user_data[id_produtos]'>
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