<?php

require_once('header.php');

//inclui o script de conexão.
require_once('connection.php');

$login = utf8_decode($_POST['login']);

$queryCountJogador = "SELECT count(*) FROM jogador WHERE login = '$login' ";
$countJogadorResult = mysql_fetch_array(mysql_query($queryCountJogador)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryCountJogador );
$existe = $countJogadorResult[0];

echo "existe=" . $existe;
 
?>