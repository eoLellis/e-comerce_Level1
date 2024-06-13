<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial Level1</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://i.pinimg.com/originals/c2/b8/cd/c2b8cdd24376f626de20e8684eb1e431.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -80px;
            text-align: center;
            color: whitesmoke;
        }

        .box {
            position: absolute;
            top: 50%;
            left: 50%;
            border: 4px solid rgba(7, 0, 84, 0.8);
            transform: translate(-50%, -50%);
            background: transparent;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 60px 30px;
            border-radius: 15px;
            text-align: center;
        }

        .content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .box img {
            max-width: 150px;
            max-height: 75px;
            margin: 0 20px;
            border-radius: 20px;
        }

        .box a {
            text-decoration: none;
            color: whitesmoke;
        }

        .box a.button {
            border: 3px solid rgb(43, 26, 133);
            border-radius: 15px;
            padding: 15px 55px;
            margin: 5px;
            background-image: linear-gradient(to right, rgba(58, 169, 200, 0.3), rgba(0, 2, 112, 0.3));
            backdrop-filter: blur(10px);
            font-size: 23px;
        }

        .box a.button:hover {
            background-image: linear-gradient(to right, rgba(69, 208, 247, 0.403), rgba(132, 91, 207, 0.381));
            border: 3px solid rgb(56, 41, 133);
        }
    </style>
</head>

<body>
    <H1>Bem Vindo New Player! ☁️</H1>
    <form action="testeLogin.php" method="POST">
        <div class="box">
            <div class="content">

                <a class="button" href="formularioLogin.php">Login</a>
                <a href="formularioCadastro.php">
                    <img src="nuvemHome.gif" alt="gif">
                </a>
                <a class="button" href="formularioCadastro.php">Cadastre-se</a>
            </div>
        </div>
    </form>
</body>

</html>