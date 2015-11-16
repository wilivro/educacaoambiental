<?php

require_once('header.php');

//inclui o script de conexão.
require_once('connection.php');

$login = utf8_decode($_POST['login']);
$senha = md5(utf8_decode($_POST['senha']));

$queryJogador = "SELECT id_jogador FROM jogador WHERE login = '$login' && senha = '$senha' LIMIT 1 "; 
$jogadorResult = mysql_fetch_array(mysql_query($queryJogador)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryJogador );
$id_jogador = $jogadorResult[0];

echo "id_jogador=" . $id_jogador;

$queryNiveis = "SELECT COUNT(DISTINCT(nivel)) FROM pontuacao WHERE id_jogador = '$id_jogador' "; 
$niveisResult = mysql_fetch_array(mysql_query($queryNiveis)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryNiveis );
$jogou_niveis = $niveisResult[0];

echo "&jogou_niveis=" . $jogou_niveis;

$queryContinua = "SELECT COUNT(DISTINCT(nivel)) FROM registro_jogo WHERE id_jogador = '$id_jogador' "; 
$continuaResult = mysql_fetch_array(mysql_query($queryContinua)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryContinua );
$continua = $continuaResult[0];

echo "&continua=" . $continua;
 
?>