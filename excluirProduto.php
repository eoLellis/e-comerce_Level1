<?php


include_once ("config.php");


if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id_produtos = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM produtos WHERE id_produtos = $id";

        $resultDelete = $conexao->query($sqlDelete);

    }

}
header('Location: exibirProdutos.php');

?>