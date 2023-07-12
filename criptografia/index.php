<?php 
    if(!isset($_SESSION))
        session_start();

    var_dump($_SESSION);

    if(!isset($_SESSION["user"])){
        header("Location:login.php");
        die("Você não está logado, redirecionando para página de login.");  
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
    <div>
        <a href="signup.php"><button>Criar conta</button></a>
        <a href="logout.php"><button>Sair da seção</button></a>
    </div>
</body>

</html>