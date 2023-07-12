<?php 

//timestamp - tempo em milissegundos passados desde 1970.

//time mostra os milessegundos de agora:
echo "<p>" . time() . "</p>";


//strtotime - converte data do padrão americano para o timestamp
echo "<p>" . strtotime("2023-07-12") . "</p>";


//quantos segundos se passaram do dia 12/07/2023 (ano anterior na data do teste) até agora:
echo "<p>" . (time() - strtotime("2022-07-12"))/86400 . "</p>"; //86400 são os milessegundos passados em um dia.


//de onde começa a contagem:
echo "<p>" . strtotime("1970-01-01") . "</p>"; 


//date formata uma data de acordo com paramentros usados:
echo "<p>" . date("d/m/Y", strtotime("1970-01-01")) . "</p>"; //formatado para o padrão brasileiro...

//exemplos:

echo "<p>Data atual em timestamp: " . time() . "</p>";
echo "<p>Data atual em timestamp com padrão brasileiro: " . date("d/m/Y", time()) . "</p>";
echo "<p>Data atual em timestamp: " . strtotime("2023-07-12") . "</p>";

$data = "2023-07-12";
$nova_data = strtotime($data) + (86400*10);
echo "<p>Somando 10 dias com a data atual em timestamp: " . date("d/m/Y", $nova_data) . "</p>";

$data = "2023-07-12";
$nova_data = strtotime($data) - (86400*10);
echo "<p>Somando 10 dias com a data atual em timestamp: " . date("d/m/Y", $nova_data) . "</p>";

echo "<p>Data atual em timestamp para o padrão do banco de dados: " . date("Y-m-d H:i:s", time()) . "</p>";

$date = random_int(strtotime("1970-01-01"), time());
$show_date = date("d/m/Y", $date);
$date_month = date("m", $date);
$day_of_week = date("D", $date);
echo "<p>Descobrir um mês de uma ano aleatorio da data $show_date: $date_month e seu dia da semana: $day_of_week </p>";