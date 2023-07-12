<?php 
    if(isset($_POST["nome"])){
        echo "<p>Bem Vindo, " . $_POST["nome"] . "</p>";
        //set cookie requer o nome do cookie, o dado e o tempo de duração dele.
        $vencimento = time() + (30 * 24 * 60 * 60); //30 dias depois da data atual
        setcookie("nome", $_POST["nome"], $vencimento);

        header("Location: boasvindas.php");
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


    <form action="" method="POST">
        <p>Qual o seu nome?</p>
        <input type="text" name="nome">
        <button type="submit">Salvar</button>
    </form>
</body>

</html>