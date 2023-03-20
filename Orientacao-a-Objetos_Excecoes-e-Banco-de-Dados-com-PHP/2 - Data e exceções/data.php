<?php
//echo date('d/m/Y') . "<br>";
//echo $data->format('d-m-Y H:i:s') . "<br>";

date_default_timezone_set('America/Sao_Paulo');

/*
 -> P   representação de período: vem antes de dia, mês, ano e semana
 Y anos
 M meses
 D dias 
 W semanas
 -> T   representação de tempo: vem antes de hora, minuto e segundo
 H horas
 M minutos
 S segundos
*/

$data = new DateTime();

$intervalo = new DateInterval('P5Y10M5DT10H50M10S'); // adiciona um período de 5 minutos
$data->sub($intervalo);

var_dump($data);
?>