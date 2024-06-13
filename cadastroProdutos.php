<?php

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {

    // Inclui o arquivo de configuração do banco de dados
    include_once ('config.php');

    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];


    // Insere os dados do formulário no banco de dados
    $result = mysqli_query($conexao, "INSERT INTO produtos( nome_produto, preco, imagem_produto)
     VALUES ('$nome','$preco','$imagem')");

    // Redireciona para o formulário de login após a inserção dos dados
    header('Location: exibirProdutos.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to right, rgb(1, 64, 82), rgba(96, 104, 22, 0.558));
            position: relative; /* Torna o body um container relativo */
        }

        .box {
            background-color: rgba(194, 238, 239, 0.8);
            padding: 15px 30px;
            border-radius: 20px;
            width: 27%;
            text-align: center;
        }

        legend {
            width: 50%;
            background-image: linear-gradient(to right, rgb(12, 70, 54), rgba(24, 101, 91, 0.621));
            color: snow;
            padding: 15px;
            border-radius: 15px;
        }

        img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 18px;
            margin-top: 15px;

        }

        #submit {
            background-image: linear-gradient(to right, rgb(14, 64, 67), rgba(15, 119, 84, 0.758));
            width: 70%;
            border: none;
            padding: 15px;
            color: #fff;
            border-radius: 15px;
            font-size: 15px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            font-weight: bold;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgba(32, 74, 86, 0.763), rgba(5, 102, 86, 0.867));
            border-radius: 30px;

        }

        .produtosNossos {
            font-size: 25px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-weight: bold;

        }

        a {
            text-decoration: none;
        }

        .voltarAdmin {
            position: absolute; /* Define a posição absoluta */
            top: 20px; /* Ajusta a distância do topo */
            left: 20px; /* Ajusta a distância da esquerda */
            border-radius: 140px;
        }

        .voltarParaAdmin{
            border-radius: 45%;
            max-width: 100px;
        }
    </style>

</head>

<body>
    <div class="box">
        <form action="cadastroProdutos.php" method="POST">
            <fieldset>
                <legend><b>Novo Produto</b></legend>
                <br>
                <div class="inputBox">
                    <label for="nome"><b>Nome</b></label>
                    <br>
                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome do Produto..." required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="preco"><b>Preço</b></label>
                    <br>
                    <input type="number" step="any" name="preco" id="preco" class="inputUser" placeholder="R$: " required>
                    <br>
                    <br>

                </div>
                <br>
                <div class="inputBox">
                    <label for="imagem"><b>Imagem</b></label>
                    <br>
                    <input type="file" name="imagem" id="imagem" class="inputUser" required>
                    <br><br>    
                </div>
                <input type="submit" id="submit" name="submit" value="Adicionar Produto ☁️">
            </fieldset>
        </form>

        <a href="exibirProdutos.php">
            <img src="Assets\img\adicionarProdutos.png" alt="gif">
            <div class="produtosNossos">Nossos produtos👆</div>
        </a>

    </div>

    <div class="voltarAdmin">
        <a href="admin.php">
            <img src="Assets\img\caraCorrendo.gif" alt="gif" class="voltarParaAdmin">
            <h3>Voltar</h3>
        </a>
    </div>

</body>

</html>
