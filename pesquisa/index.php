<?php 
    require("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
</head>

<body>
    <form action="">
        <input type="text" name="busca" value="<?php  if(isset($_GET['busca'])){echo $_GET['busca'];}?>"
            placeholder="Pesquise um carro">
        <button type="submit">Pesquisar</button>
    </form>

    <br>

    <table width="600px" border="1">
        <tr>
            <th>fabricante</th>
            <th>modelo</th>
            <th>veiculo</th>
        </tr>

        <?php 
        if(!isset($_GET["busca"])){
        ?>
        <tr>
            <td colspan="3">Inicie uma pesquisa...</td>
        </tr>
        <?php } else{
            $pesquisa = $mysqi->real_escape_string($_GET['busca']);

            $sql_code = "SELECT * FROM veiculos WHERE fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo LIKE '%$pesquisa%'";
            
            $sql_query = $mysqi->query($sql_code) or die("Error:" . $mysqi->error);

            if($sql_query->num_rows == 0){
            ?>



        <tr>
            <td colspan="3">Não encontrado o item...</td>
        </tr>

        <?php } else {
            
            while($dados = $sql_query->fetch_assoc()){?>

        <tr>
            <td><?php echo $dados['fabricante'] ?></td>
            <td><?php echo $dados['modelo'] ?></td>
            <td><?php echo $dados['veiculo'] ?></td>
        </tr>

        <?php }?>

        <?php }?>

        <?php }?>
    </table>

</body>

</html>