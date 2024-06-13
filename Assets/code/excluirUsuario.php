<?php


include_once ("config.php");


if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id_usuario = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM usuarios WHERE id_usuario = $id";

        $resultDelete = $conexao->query($sqlDelete);

    }

}
header('Location: admin.php');

?>