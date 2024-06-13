<?php include_once ('voltar.php');
//Botão de Voltar
?>
<?php

// Verifica se o formulário foi enviado
if (!empty($_GET['id'])) {

    // Inclui o arquivo de configuração do banco de dados
    include_once ('config.php');


    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM usuarios WHERE id_usuario =$id";

    $result = $conexao->query($sqlSelect);

    //Testando Resultados do Banco de dados
    //print_r($result);

    if ($result->num_rows > 0) {

        while ($user_data = $result->fetch_assoc()) {
            // Obtém os dados do formulário
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
            $telefone = $user_data['telefone'];
            $sexo = $user_data['sexo'];
            $data_nasc = $user_data['data_nasc'];
            $endereco = $user_data['endereco'];
            $estado = $user_data['estado'];
        }

        // print_r($nome);

    } else {
        header("Location: admin.php");
    }

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

        #alterar {
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

        #alterar:hover {
            background-image: linear-gradient(to right, rgb(62, 144, 216), rgba(117, 10, 194, 0.777))
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="salvarUsuario.php" method="POST">
            <fieldset>
                <legend><b>Novo Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome"><b>Nome Completo</b></label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email"><b>Email</b></label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>"
                        required>
                    <label for="senha"><b>Senha: </b></label>
                    <br><br>
                </div>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>"
                        required>
                    <label for="telefone"><b>Telefone</b></label>
                </div>
                <br>
                <p><b>Sexo:</b></p>
                <input type="radio" id="feminino" name="genero" value="Feminino" <?php echo ($sexo == 'Feminino') ? 'checked' : '' ?> required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : '' ?> required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : '' ?> required>
                <label for="outro">Outro</label>
                <br><br>

                <label for="dataNascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nasc" id="dataNascimento" value="<?php echo $data_nasc ?>" required>
                <br><br>

                <div class="inputBox">
                    <label for="endereco"><b>Endereço: </b></label>
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>"
                        required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="estado"><b>Selecione seu Estado: </b></label>
                    <select name="estado" id="estado" class="nomeEstados" required>
                        <option value="" disabled>Aqui!</option>
                        <option value="AC" <?php echo ($estado == 'AC') ? 'selected' : '' ?>>Acre</option>
                        <option value="AL" <?php echo ($estado == 'AL') ? 'selected' : '' ?>>Alagoas</option>
                        <option value="AP" <?php echo ($estado == 'AP') ? 'selected' : '' ?>>Amapá</option>
                        <option value="AM" <?php echo ($estado == 'AM') ? 'selected' : '' ?>>Amazonas</option>
                        <option value="BA" <?php echo ($estado == 'BA') ? 'selected' : '' ?>>Bahia</option>
                        <option value="CE" <?php echo ($estado == 'CE') ? 'selected' : '' ?>>Ceará</option>
                        <option value="DF" <?php echo ($estado == 'DF') ? 'selected' : '' ?>>Distrito Federal</option>
                        <option value="ES" <?php echo ($estado == 'ES') ? 'selected' : '' ?>>Espírito Santo</option>
                        <option value="GO" <?php echo ($estado == 'GO') ? 'selected' : '' ?>>Goiás</option>
                        <option value="MA" <?php echo ($estado == 'MA') ? 'selected' : '' ?>>Maranhão</option>
                        <option value="MT" <?php echo ($estado == 'MT') ? 'selected' : '' ?>>Mato Grosso</option>
                        <option value="MS" <?php echo ($estado == 'MS') ? 'selected' : '' ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php echo ($estado == 'MG') ? 'selected' : '' ?>>Minas Gerais</option>
                        <option value="PA" <?php echo ($estado == 'PA') ? 'selected' : '' ?>>Pará</option>
                        <option value="PB" <?php echo ($estado == 'PB') ? 'selected' : '' ?>>Paraíba</option>
                        <option value="PR" <?php echo ($estado == 'PR') ? 'selected' : '' ?>>Paraná</option>
                        <option value="PE" <?php echo ($estado == 'PE') ? 'selected' : '' ?>>Pernambuco</option>
                        <option value="PI" <?php echo ($estado == 'PI') ? 'selected' : '' ?>>Piauí</option>
                        <option value="RJ" <?php echo ($estado == 'RJ') ? 'selected' : '' ?>>Rio de Janeiro</option>
                        <option value="RN" <?php echo ($estado == 'RN') ? 'selected' : '' ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php echo ($estado == 'RS') ? 'selected' : '' ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php echo ($estado == 'RO') ? 'selected' : '' ?>>Rondônia</option>
                        <option value="RR" <?php echo ($estado == 'RR') ? 'selected' : '' ?>>Roraima</option>
                        <option value="SC" <?php echo ($estado == 'SC') ? 'selected' : '' ?>>Santa Catarina</option>
                        <option value="SP" <?php echo ($estado == 'SP') ? 'selected' : '' ?>>São Paulo</option>
                        <option value="SE" <?php echo ($estado == 'SE') ? 'selected' : '' ?>>Sergipe</option>
                        <option value="TO" <?php echo ($estado == 'TO') ? 'selected' : '' ?>>Tocantins</option>
                    </select>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" id="alterar" name="alterar" value="Alterar Usuário ☁️">
            </fieldset>
        </form>
    </div>
</body>

</html>