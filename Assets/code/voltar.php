<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .banner {
            position: relative; /* Faz com que o posicionamento dos elementos filhos seja relativo a este */
            text-align: center;
            
        }

        .banner-container {
            position: absolute; /* Posicionamento absoluto */
            top: 10px; /* Distância do topo */
            right: 10px; /* Distância da direita */
        }

        .banner-img {
            max-width: 150px;
            max-height: 75px;
            margin: 0 20px;
            border-radius: 20px;
        }


        .voltar{
            font-size: 20px;
            color: red;
        }

        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="banner">
        <div class="banner-container">
            <a href="home.php">
                <img src="Assets\img\nuvemHome.gif" alt="GIF" class="banner-img">
                <div class="voltar">Voltar</div>

            </a>
        </div>
    </div>
</body>

</html>
