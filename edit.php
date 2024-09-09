<?php
    if (!empty($_GET['id'])) {
        
        include_once('config.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0) {

            while ($user_data = mysqli_fetch_assoc($result)) {
                $nome = $user_data['nome'];
                $senha = $user_data['senha'];
                $email = $user_data['email'];
                $telefone = $user_data['telefone'];
                $sexo = $user_data['sexo'];
                $data = $user_data['data_nasc'];
                $cidade = $user_data['cidade'];
                $estado = $user_data['estado'];
                $endereco = $user_data['endereco'];
            }
        } else {
            header('Location: sistema.php');
        }
    }else{
        header('Location: sistema.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/formularioStyle.css?v=1.0">
    <link rel="stylesheet" href="assets/css/editStyle.css">
    <title>Tela de login</title>
</head>

<body>
    <a href="sistema.php">Voltar</a>
    <section class="box">

        <form action="saveEdit.php" method="post" id="a">

            <fieldset>

                <legend>
                    <strong>Tela de login</strong>
                </legend>

                <br>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>

                <br><br>
                <div class="inputBox">
                    <input type="text" name="senha" id="senha" class="inputUser" maxlength="20" value="<?php echo $senha ?>" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>



                <p>Sexo:</p>
                <input type="radio" name="sexo" id="feminino" <?php echo ($sexo == 'feminino' ? 'checked' : '') ?> value="feminino">
                <label for="feminino">Feminino</label>

                <br>

                <input type="radio" name="sexo" id="masculino" <?php echo ($sexo == 'masculino' ? 'checked' : '') ?> value="masculino">
                <label for="masculino">Masculino</label>

                <br><br>

                <div>
                    <label for="data"><strong>Data de Nascimento:</strong></label>
                    <input type="date" name="data" id="data" value="<?php echo $data ?>" required>
                </div>

                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>

                <br><br>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" id="botao">
            </fieldset>

        </form>

    </section>
</body>

</html>