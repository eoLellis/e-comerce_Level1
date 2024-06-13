<?php

// Verifica se o formulário foi enviado
if (!empty($_GET['id'])) {

    // Inclui o arquivo de configuração do banco de dados
    include_once ('config.php');


    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM produtos WHERE id_produtos =$id";

    $result = $conexao->query($sqlSelect);

    //Testando Resultados do Banco de dados
    //print_r($result);

    if ($result->num_rows > 0) {

        while ($user_data = $result->fetch_assoc()) {
            // Obtém os dados do formulário
            $nome = $user_data['nome_produto'];
            $preco = $user_data['preco'];
            $imagem = $user_data['imagem_produto'];


        }

        // print_r($nome);

    } else {
        header("Location: admin.php");
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produto</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: linear-gradient(to right, rgb(1, 64, 82), rgba(96, 104, 22, 0.558));
            position: relative;
            /* Torna o body um container relativo */
        }

        .box {
            background-color: rgba(194, 238, 239, 0.8);
            padding: 15px 30px;
            border-radius: 20px;
            width: 27%;
            text-align: center;
            justify-content: ;
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

        #alterar {
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

        #alterar:hover {
            background-image: linear-gradient(to right, rgba(32, 74, 86, 0.763), rgba(5, 102, 86, 0.867));
            border-radius: 30px;

        }

        .voltarAdmin {
            position: absolute;
            /* Define a posição absoluta */
            top: 20px;
            /* Ajusta a distância do topo */
            left: 20px;
            /* Ajusta a distância da esquerda */
            border-radius: 140px;
        }

        .voltarParaAdmin {
            border-radius: 45%;
            max-width: 100px;
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="salvarProduto.php" method="POST">
            <fieldset>
                <legend><b>Editar Produto</b></legend>
                <br>
                <div class="inputBox">
                    <label for="nome"><b>Nome do Produto</b></label>
                    <br>
                    <br>
                    <input type="text" name="nome_produto" id="nome" class="inputUser" value="<?php echo $nome ?>"
                        required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="email"><b>Preço</b></label>
                    <br>
                    <br>
                    <input type="number" step="any" name="preco" id="preco" class="inputUser"
                        value="<?php echo $preco ?>" required>
                </div>
                <br>
                <div class="inputBox">
                    <label for="senha"><b>Imagem</b></label>
                    <br>
                    <br>
                    <input type="file" name="imagem_produto" id="imagem" class="inputUser" value="<?php echo $imagem ?>"
                        >
                    <br>
                    <br>
                    <br>
                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" id="alterar" name="alterar" value="Alterar Produto ☁️">
            </fieldset>
        </form>
        <div class="voltarAdmin">
        <a href="exibirProdutos.php">
            <img src="Assets\img\caraCorrendo.gif" alt="gif" class="voltarParaAdmin">
            <h3>Voltar</h3>
        </a>
    </div>
    </div>
</body>

</html>