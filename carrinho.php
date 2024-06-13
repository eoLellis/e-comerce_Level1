<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Seu Carrinho | Level1</title>
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-image: url('nuvens-de-estilo-anime.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -80px;        }
        .voltarLoja {
            position: absolute;
            top: 500px;
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
        .total{
            font-size: 30px;
            width: 20%;
            border-radius: 40px;
            text-align: center;
            background-color: chartreuse;
        }

    </style>
</head>

<body>

</body>

</html>
<?php
include_once ('config.php');

// Verificar se um produto foi adicionado ao carrinho
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_produtos'])) {
    $idProduto = $_POST['id_produtos'];

    // Verificar se o produto já está no carrinho
    $sqlVerificar = "SELECT * FROM carrinho WHERE carrinho_id_produtos = $idProduto";
    $resultadoVerificar = $conexao->query($sqlVerificar);

    if ($resultadoVerificar->num_rows > 0) {
        // Produto já está no carrinho, então atualize a quantidade
        $sqlAtualizar = "UPDATE carrinho SET quantidade = quantidade + 1 WHERE carrinho_id_produtos = $idProduto";
        if ($conexao->query($sqlAtualizar) === TRUE) {
            echo "Quantidade atualizada com sucesso.<br>";
        } else {
            echo "Erro ao atualizar a quantidade: " . $conexao->error . "<br>";
        }
    } else {
        // Produto não está no carrinho, então insira-o com quantidade 1
        $sqlInserir = "INSERT INTO carrinho (carrinho_id_produtos, quantidade) VALUES ($idProduto, 1)";
        if ($conexao->query($sqlInserir) === TRUE) {
            echo "Produto adicionado ao carrinho.<br>";
        } else {
            echo "Erro ao adicionar produto ao carrinho: " . $conexao->error . "<br>";
        }
    }
    // Redirecionar de volta à página de produtos
    header("Location: lojaLevel1.php");
    exit();
}

// Consultar o banco de dados para obter os itens do carrinho
$sql = "SELECT produtos.id_produtos, produtos.nome_produto, produtos.preco, carrinho.quantidade, carrinho.id_carrinho
        FROM produtos
        INNER JOIN carrinho ON produtos.id_produtos = carrinho.carrinho_id_produtos";
$resultado = $conexao->query($sql);

// Verificar se há produtos no carrinho
if ($resultado->num_rows > 0) {


    // Inicializar o total
    $total = 0;


    // Exibir os produtos do carrinho
    echo "<table>
        <table class='table table-striped table-bordered' style='background-color: #f8f9fa; color: #000;'>
        <thead class='table-dark'>
            <tr>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Excluir</th>

            </tr>
            </thead>
            ";
    while ($linha = $resultado->fetch_assoc()) {

        // Calcular o subtotal para cada produto (preço * quantidade)
        $subtotal = $linha['preco'] * $linha['quantidade'];

        // Adicionar o subtotal ao total
        $total += $subtotal;


        echo "<tr>";
            echo"<td>" . $linha['nome_produto'] . "</td>";
            echo"<td>R$: " . $linha['preco'] . "</td>";
            echo"<td>" . $linha['quantidade'] . "</td>";

        echo "<td>
            <a class='btn btn-sm btn-danger' href='excluirCarrinho.php?id=$linha[id_carrinho]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
            </svg>
            </td>";

        echo "</tr >";
    }
    echo "</table>";
    // Exibir o total
    echo "<div class='total'> <b>Total R$: $total</b>    </div>";
    echo "<form method='POST' action='comprar.php'>
    <button type='submit' class='btn btn-success comprar'>Comprar</button>
    </form>";
} else {
    echo "O carrinho está vazio.<br>";
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
<div class="voltarLoja">
        <a href="lojaLevel1.php">
            <img src="carrinhoVoltar.gif" alt="gif" class="carrinhoVoltar">
            <h3>Voltar</h3>
        </a>
    </div>
</html>
