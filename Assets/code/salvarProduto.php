<?php


    include_once("config.php");


    if(isset($_POST["alterar"])){

        $id = $_POST['id'];
        $nome = $_POST['nome_produto'];
        $preco = $_POST['preco'];
        $imagem = $_POST['imagem_produto'];

        $sqlUpdate = "UPDATE produtos SET nome_produto='$nome',preco='$preco', imagem_produto='$imagem'  
        WHERE id_produtos = $id";

        $result = $conexao->query($sqlUpdate);
    
    }
    header('Location: exibirProdutos.php');

?>