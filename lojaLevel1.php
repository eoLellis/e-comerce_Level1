<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    // Se não estiver logado, redirecionar para a página de login
    header('Location: formularioLogin.php');
    exit(); // Encerrar o script para evitar que o restante da página seja carregado
}

include_once('config.php');

// Obter informações do perfil do usuário
$email = $_SESSION['email'];
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conexao->query($sql);
$usuario = $result->fetch_assoc(); // Obter os dados do usuário

$sqlProdutos = "SELECT * FROM produtos";
$resultProdutos = $conexao->query($sqlProdutos);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Level 1</title>
    <link rel="stylesheet" href="nuvens-de-estilo-anime.jpg">
    <style>
        /* Estilos CSS aplicados a partir do arquivo fornecido */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-image: url('Assets/img/nuvens-de-estilo-anime.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center -80px;
        }

        .header {
            width: 70%;
            height: 80px;
            background-color: deepskyblue;
            display: flex;
            margin: 30px 0;
            padding: 15px;
            border-radius: 5px;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            font-size: 30px;
            font-weight: bold;
            color: black;
        }

        .carrinho {
            font-size: 30px;
            width: 60px;
            display: flex;
            background-color: #fff;
            justify-content: center;
            border-radius: 3px;
            align-items: center;
            padding: 7px 10px;
        }

        .conteiner {
            display: flex;
            width: 70%;
            margin-bottom: 30px;
        }

        .linhaProduto {
            display: grid;
            width: 100%;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
        }

        .corpoProduto {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            padding: 55px;
            border: 3px solid darkblue;
            border-radius: 14px;
            background-image: linear-gradient(to bottom, rgb(70, 210, 255), rgba(255, 228, 196, 0.8));
        }

        .imgProduto {
            width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .produtoMiniatura {
            max-width: 90%;
            max-height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 7px;
        }

        .titulo {
            width: 100%;
            height: 100px;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            margin-top: 5px;
            flex-direction: column;
        }

        h2 {
            font-size: 15px;
            color: darkblue;
            box-shadow: 0 8px 5px rgba(0, 0, 0, 0.5);
            border: 1px solid green;
            padding: 8px;
            margin-bottom: 5px;
            border-radius: 17px;
        }

        .preco {
            display: flex;
            justify-content: center;
            color: darkblue;
            border: 1px solid #000;
            border-radius: 17px;
            background-image: linear-gradient(to right, rgba(255, 217, 0, 0.71), rgba(190, 51, 51, 0.9));
        }

        .addcarrinho {
            background-color: rgb(0, 92, 150);
            width: 100%;
            border-radius: 5px;
            position: relative;
            padding: 7px 25px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 8px 5px rgba(0, 0, 0, 0.5);
        }

        .addcarrinho:hover {
            background-color: rgb(0, 131, 212);
        }

        .rodape {
            width: 100%;
            padding: 15px;
            color: bisque;
            background-image: linear-gradient(to right, rgba(17, 145, 151, 0.834), rgba(27, 93, 135, 0.895));
            margin-top: 0;
        }

        .botaoContato {
            display: flex;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            background-color: rgb(5, 5, 168);
            border: none;
            cursor: pointer;
        }

        .botaoContato:hover {
            background-color: rgb(0, 131, 212);
        }

        .informacaoContato {
            font-size: 14px;
            font-weight: bold;
            color: rgb(4, 34, 52);
            margin-top: 5px;
            flex-direction: column;
            line-height: 1.5;
        }

        .header .carrinho {
            width: 60px;
            /* Defina o tamanho desejado para a imagem do carrinho */
            height: auto;
            /* Mantém a proporção da imagem */
        }
    </style>
</head>

<body>
    <!--- TOPO DO SITE --->
    <div class="header">
        <p class="logo">Level 1</p>
        <a href="carrinho.php">
            <img src="parte2Trab/img/carrinho.png" alt="carrinhofoda" class="carrinho">
        </a>
    </div>
    <!--- FIM DO TOPO DO SITE --->

    <!--- CONTEÚDO DO SITE --->
    <div class="conteiner">
        <!--- LINHA DE PRODUTOS --->
        <form action="carrinho.php" method="POST">
            <div class="linhaProduto">
                <?php while ($produto = $resultProdutos->fetch_assoc()) { ?>
                    <div class="corpoProduto">
                        <div class="imgProduto">
                            <img src="<?php echo $produto['imagem_produto']; ?>" alt="<?php echo $produto['nome_produto']; ?>" class="produtoMiniatura">
                        </div>
                        <div class="titulo">
                            <h2><?php echo $produto['nome_produto']; ?></h2>
                            <div class="preco"><?php echo 'R$ ' . number_format($produto['preco'], 2, ',', '.'); ?></div>
                            <!-- Modificação aqui: cada botão tem um valor único -->
                            <form action="carrinho.php" method="POST">
                                <input type="hidden" name="id_produtos" value="<?php echo $produto['id_produtos']; ?>">
                                <button type="submit" name="addcarrinho" class="addcarrinho">Comprar!</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
    <!--- FIM DO CONTEÚDO DO SITE --->

    <!--- INICIO RODAPÉ --->
    <footer class="rodape">
        <div class="contato">
            <button class="botaoContato">Fale Conosco</button>
            <div class="informacaoContato">
                <p>Endereço Level 1: Avenida: Brasil, Rua: Tchurusbango Tchurusbago</p>
                <p>Fone para Contato: 40028922</p>
                <p>Email: titiojoao123@gmails.cons</p>
                <p>Email: LuizZé@gmail.com</p>
                <p>Email: eoLellis@gmail.com</p>
            </div>
        </div>
    </footer>
    <!--- FIM RODAPÉ --->
</body>

</html>
