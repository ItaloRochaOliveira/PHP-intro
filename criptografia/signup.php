<?php 
    if(!isset($_SESSION))
    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        die("Você não está logado, redirecionando para página de login.");   
    }

    require("conexao.php");

    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql_code_signup = "INSERT INTO senha (email, senha) VALUES ('$email', '$hash')";

        $signup = $mysqi->query($sql_code_signup) or die($mysqi->error);

        if($signup) 
            header("Location: ../criptografia");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php"><button>Voltar para home</button></a>
    <h1>Cadastro de Usuários</h1>
    <form action="" method="POST">
        <label for="">
            <input type="text" name="email" placeholder="email@email.com">
        </label>
        <label for="">
            <input type="text" name="senha" placeholder="Senha123">
        </label>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>