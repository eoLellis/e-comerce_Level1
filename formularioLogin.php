<?php include_once ('voltar.php');
//Botão de Voltar
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Level 1</title>
    <style>
        body {
            background-image: url('https://i.pinimg.com/originals/c2/b8/cd/c2b8cdd24376f626de20e8684eb1e431.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -80px;
        }

        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            padding: 15px;
            background-color: rgba(194, 238, 239, 0.8);
            width: 20%;
        }

        .submit {
            width: 70%;
            padding: 15px;
            display: block;
            margin: 0 auto;
        }

        fieldset {
            border: 3px solid rgb(27, 93, 151);
        }

        legend {
            padding: 15px;
            border: none;
            font-style: bold;
            font-size: 17px;
            border-radius: 15px;
            background-color: rgb(27, 93, 151);

        }

        input {
            padding: 10px;
            border: 3px solid rgb(80, 133, 255);
            outline: none;
            margin-top: 10px;
            border-radius: 70px;
        }

        .botao {
            background-image: linear-gradient(to right, rgb(20, 18, 115), rgba(22, 98, 146, 0.558));
            border: none;
            padding: 15px;
            border-radius: 7px;
            width: 100%;
            margin-top: 30px;
            font-size: 16px;
            font-weight: bold;
            color: bisque;
            cursor: pointer;
        }

        .botao:hover {
            background-image: linear-gradient(to right, rgb(66, 3, 108), rgba(13, 166, 186, 0.677))
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="testeLogin.php" method="POST">
            <fieldset>
                <legend><b>Entre na Level 1</b></legend>
                <br>
                <div class="inputBox">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>
                <input class="botao" type="submit" name="submit" value="Entrar ☁️ ">
            </fieldset>

        </form>
    </div>
</body>

</html>