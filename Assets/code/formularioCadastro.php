<?php include_once ('voltar.php');
//Botão de Voltar
?>
<?php

// Verifica se o formulário foi enviado
if (isset($_POST['submit'])) {

    // Inclui o arquivo de configuração do banco de dados
    include_once ('config.php');

    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $estado = $_POST['estado'];

    // Insere os dados do formulário no banco de dados
    $result = mysqli_query($conexao, "INSERT INTO usuarios( nome, email, senha, telefone, sexo, data_nasc, endereco, estado)
     VALUES ('$nome','$email','$senha', '$telefone','$sexo','$data_nascimento','$endereco','$estado')");

    // Redireciona para o formulário de login após a inserção dos dados
    header('Location: formularioLogin.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Level 1</title>
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
            background-color: rgba(194, 238, 239, 0.8);
            padding: 15px 30px;
            border-radius: 20px;
            width: 27%;
        }

        fieldset {
            border: 3px solid rgb(27, 93, 151);


        }

        legend {
            border: 1px solid rgb(27, 93, 151);
            padding: 10px;
            background-color: rgb(27, 93, 151);
            border-radius: 8px;
            font-size: 18px;

        }

        .inputBox {
            position: relative;

        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        #dataNascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            color: black;
            font-size: 10 px;
            display: table-column;
        }

        #submit {
            background-image: linear-gradient(to right, rgb(16, 15, 125), rgba(52, 4, 84, 0.558));
            width: 70%;
            border: none;
            padding: 15px;
            color: #fff;
            border-radius: 15px;
            font-size: 15px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            font-weight: bold;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(62, 144, 216), rgba(117, 10, 194, 0.777))
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="formularioCadastro.php" method="POST">
            <fieldset>
                <legend><b>Cadastre-se na Level 1</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome"><b>Nome Completo</b></label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email"><b>Email</b></label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha"><b>Senha: </b></label>
                    <br><br>
                </div>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone"><b>Telefone</b></label>
                </div>
                <br>
                <p><b>Sexo:</b></p>
                <input type="radio" id="feminino" name="genero" value="Feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>

                <label for="dataNascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="dataNascimento" id="dataNascimento" required>
                <br><br>

                <div class="inputBox">
                    <label for="endereco"><b>Endereço: </b></label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado"><b>Selecione seu Estado: </b></label>
                    <select name="estado" id="estado" class="nomeEstados" required>
                        <option value="" disabled selected>Aqui!</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <br><br>
                <input type="submit" id="submit" name="submit" value="Cadastrar ☁️">
            </fieldset>
        </form>
    </div>
</body>

</html>