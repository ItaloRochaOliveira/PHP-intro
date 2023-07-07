<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

    <style>
    .error {
        color: red;
    }
    </style>
</head>

<body>
    <form method="POST" action="">

        <p class="error"> * Obrigatório</p>

        Nome: <input type="text" name="nome"> <span <?php 
                if (empty($_POST["nome"]) || strlen($_POST["nome"]) < 3){ 
                    echo "class='error'";
                } else { 
                    echo "class=''";
                }; ?>> * </span> <br> <br>
        E-mail: <input type="email" name="email"> <span class="error"> * </span> <br> <br>
        Website: <input type="text" name="web"> <br> <br>
        Comentário: <textarea type="text" name="comentario" cols="30" rows="3"> </textarea> <br> <br>
        Gênero: <input type="radio" name="genero" value="masculino"> Masculino
        <input type="radio" name="genero" value="feminino"> Femino
        <input type="radio" name="genero"> Outro <br> <br>

        <button type="submit" name="enviado" value="outros">Enviar</button> <br> <br>

        <h1>Dados Enviados: </h1>

        <?php 

        // var_dump($_POST);

        
        if(isset($_POST["enviado"])){

            if(empty($_POST["nome"]) || strlen($_POST["nome"]) < 3 || strlen($_POST["nome"]) > 100){
                echo "<p class='error'> Preencha o campo nome </p>";

                die();
            }

            if(empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                echo "<p class='error'> Preencha o campo e-mail </p>";

                die();
            }

            if(!empty($_POST["web"]) && !filter_var($_POST["web"], FILTER_VALIDATE_URL)){
                echo "<p class='error'> Preencha o campo url </p>";

                die();
            }

            $genero = "Não selecionado.";

            if(isset($_POST["genero"])){
                $genero = $_POST["genero"];

                if($genero != "masculino" || $genero != "feminino" || $genero != "outros" ) {
                    echo "<p class=\"error\"> Preecha corretamente o gênero </p>";

                    die();
                }

            };

            echo "<p> <b> Nome: </b>" . $_POST["nome"] . " </p>";
            echo "<p> <b> Email: </b>" . $_POST["email"] . " </p>";
            echo "<p> <b> WebSite:</b> " . $_POST["web"] . " </p>";
            echo "<p> <b> Comentário: </b>" . $_POST["comentario"] . " </p>";
            echo "<p> <b> Gênero: </b>" . $genero . " </p>";
        };

        ?>
    </form>
</body>

</html>