<?php 
    require("conexao.php");

    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql_code_login = "SELECT * FROM senha WHERE email = '$email' LIMIT 1";

        $login = $mysqi->query($sql_code_login) or die($mysqi->error);

        $login_exist = $login->fetch_assoc();

        if(isset($login_exist)){
            $hash = password_verify($senha, $login_exist["senha"]);

            if($hash){
                if(!isset($_SESSION))
                    session_start();
                $_SESSION["user"] = $login_exist['id'];

                header("Location:index.php");

                echo "<p> User logado com sucesso, redirecionando para a página principal... </p>";

                die();
            } else {
                echo "<p> Falha ao logar! Senha ou email incorreto! </p>";
            }
        }

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
    <h1>Login</h1>
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