<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        $nome = "Um nome";
        echo "<p>super tag PHP </p>";
        echo "<p> aqui é $nome </p>";
    ?>

    <?
        echo "short open tag"
    ?>

    <!-- <%
        echo "ASP tag"
    %> -->

    <?= 
        "short tag PHP"
    ?>

    <?php 
        date_default_timezone_set("America/Goias");
        echo "Hoje é dia " . date("d/M/Y");
        echo "e a hora atual é" . date("G:i:s");
    ?>
</body>

</html>