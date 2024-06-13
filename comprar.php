<?php
include_once ('config.php')





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprando</title>
    <style>
                body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-image: url('nuvens-de-estilo-anime.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -80px;        
        }
        .produto-container{
            border: 2px solid blue;
            padding: 10px;
            border-radius: 10px;
            margin-top: 5vw;
            background-color: aquamarine;
        }
        
    </style>
</head>

<body>
    <div class="produto-container">
        <div class="miniatura">
            <img src="" alt="">
            <h1>Produto Comprado com Sucesso!</h1>
            <div class="informacoes">

            </div>
        </div>
    </div>
</body>

</html>