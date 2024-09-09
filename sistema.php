<?php
session_start();
// print_r($_SESSION);

include_once('config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {

    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: telaLogin.php');
}

$logado = $_SESSION['email'];

$sql = "SELECT * FROM usuarios ORDER BY id DESC";

$result = $conexao->query($sql);

// print_r($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/sistemaStyle.css?v=1.0">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <title>Sistema</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a href="" class="navbar-brand">Sistema Yves</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"></button>

        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
    echo "<h1>Bem Vindo <u>$logado</u></h1>";
    ?>

    <div class="m-5">

        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo ("<td>". $user_data['id']."</td>");
                        echo ("<td>". $user_data['nome']."</td>");
                        echo ("<td>". $user_data['email']."</td>");
                        echo ("<td>". $user_data['senha']."</td>");
                        echo ("<td>". $user_data['telefone']."</td>");
                        echo ("<td>". $user_data['sexo']."</td>");
                        echo ("<td>". $user_data['data_nasc']."</td>");
                        echo ("<td>". $user_data['cidade']."</td>");
                        echo ("<td>". $user_data['estado']."</td>");
                        echo ("<td>". $user_data['endereco']."</td>");
                        echo ("<td> <a href='edit.php?id=$user_data[id]' class='btn btn-primary btn-sm'><i class='bi bi-pencil'></i></a> 
                        
                                    <a href='delete.php?id=$user_data[id]' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></a></td>");
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body> 
</html>