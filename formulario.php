<?php 
    $sexo = '';

    if (isset($_POST['submit'])) {
        include_once('config.php');
    
        $nome = $_POST['nome'];  
        $senha = $_POST['senha'];      
        $email = $_POST['email'];        
        $telefone = $_POST['telefone'];      
        $sexo = $_POST['sexo'];   
        $data = $_POST['data'];       
        $cidade = $_POST['cidade'];       
        $estado = $_POST['estado'];       
        $endereco = $_POST['endereco'];
    
        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereco) VALUES ('$nome', '$senha','$email', '$telefone', '$sexo','$data','$cidade','$estado','$endereco')");
    
        header('Location: telaLogin.php');
 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/formularioStyle.css?v=1.0">
    <title>Tela de login</title>
</head>
<body>
    <a href="home.php">Voltar</a>
    <section class="box">

        <form action="formulario.php" method="post" id="a">

            <fieldset>

                <legend>
                        <strong>Tela de login</strong>
                </legend>

                <br>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>

                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" maxlength="20" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
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
                    <input type="date" name="data" id="data" required>
                </div>

                <br><br><br>

                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>

                <br><br>

                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>

                <br><br>

                <input type="submit" name="submit" id="submit">
            </fieldset>

        </form>

    </section>
</body>
</html>