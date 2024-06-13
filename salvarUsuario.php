<?php


    include_once("config.php");


    if(isset($_POST["alterar"])){
    
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nasc'];
        $endereco = $_POST['endereco'];
        $estado = $_POST['estado'];

        $sqlUpdate = "UPDATE usuarios SET nome='$nome',email='$email', senha='$senha', telefone='$telefone', sexo='$sexo', data_nasc='$data_nasc', endereco='$endereco', estado='$estado'
        WHERE id_usuario = $id";

        $result = $conexao->query($sqlUpdate);
    
    }
    header('Location: admin.php');

?>