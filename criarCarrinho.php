<?php
include_once('config.php');

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
}
?>