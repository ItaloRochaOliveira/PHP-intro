<?php 
//verificar sempre o usuário e permitir o acesso apenas para usuários, isso evita brecha de segurança. Verificar também os tipos de arquivos, pois pode mandar aquivos php e zip.


require("conexao.php");

if(count($_FILES) > 0){
    var_dump($_FILES);
    // die();
}

if(isset($_GET["deletar"])){
    $id = intval($_GET["deletar"]);
    $sql_query = $mysql->query("SELECT * FROM file WHERE id = '$id'") or die($mysqli->error);
    $arquivo = $sql_query->fetch_assoc();

    if(unlink($arquivo['path'])){
        $deu_certo = $mysql->query("DELETE FROM file WHERE id = '$id'");
        if($deu_certo)
            echo "<p>Arquivo excluido com sucesso!!</p>";
    }
}

function enviar_arquivo($error, $size, $name, $tmp){
    require("conexao.php");


    if($error){
        die("Falha ao enviar arquivo");
    }

    if($size > 2097152) //2 * 1024 * 1024
        die("Arquivo muito grande!! Mx: 2MB");

    $pasta = "arquivos/";
    $nome_do_arquivo = $name;
    $novo_nome_do_arquivo = uniqid();
    $extensao = strtolower(pathinfo($nome_do_arquivo, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != "png")
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novo_nome_do_arquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($tmp, $path);

    if($deu_certo){
        $mysql->query("INSERT INTO file (nome, path) VALUE ('$nome_do_arquivo', '$path')") or die($mysql->error);
        return true;
        // echo "<p>Arquivo enviado com sucesso! Para acessa-lo, <a href='$pasta/$novo_nome_do_arquivo.$extensao' target='_blank'>clique aqui </a></p>";
    } else {
        return false;
    }
}

if(isset($_FILES["arquivos"])){
    $arquivos = $_FILES["arquivos"];

    $tudo_certo = true;

    foreach($arquivos["name"] as $index => $arquivo){
        $deu_certo = enviar_arquivo($arquivos["error"][$index], $arquivos["size"][$index], $arquivos["name"][$index], $arquivos["tmp_name"][$index]);

        if(!$deu_certo){
            $tudo_certo = false;
        }

        if($tudo_certo){
            echo "<p> Todos os arquivos foram enviados com sucesso! </p>"; 
        } else {
            echo "<p>Erro ao enviar um arquivo ou mais. </p>"; 
        }
    }

    
}

$sql_query = $mysql->query("SELECT * FROM file") or die($mysql->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <p>
            <label for="">Selecione o aquivo</label>
            <input type="file" name="arquivos[]" multiple>
        </p>
        <button type="submite">Enviar arquivo</button>
    </form>

    <table border="1" cellpadding="1">
        <thead>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>data de envio</th>
            <th></th>
        </thead>
        <tbody>
            <?php 
                while($arquivo = $sql_query->fetch_assoc()){
            ?>
            <tr>
                <td><img src="<?php echo $arquivo["path"]?>" alt="" height="50"></td>
                <td><a href="<?php echo $arquivo["path"]?>" target="_blank"><?php echo $arquivo["nome"];?></a></td>
                <td><?php echo date('d/m/Y H:i', strtotime($arquivo["data_upload"]))?></td>
                <td><a href="index.php?deletar=<?php echo $arquivo["id"]?>">deletar</a></td>
            </tr>

            <?php 
                }
            ?>
        </tbody>
    </table>


</body>

</html>