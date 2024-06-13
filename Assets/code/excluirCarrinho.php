<?php
include_once('config.php');

if (isset($_GET['id'])) {
    $idItem = $_GET['id'];


    $sqlSelect = "SELECT * FROM carrinho WHERE id_carrinho = $idItem";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM carrinho WHERE id_carrinho = $idItem";

        $resultDelete = $conexao->query($sqlDelete);
    }
}

// Fechar a conexão com o banco de dados
header('Location: carrinho.php');
?>