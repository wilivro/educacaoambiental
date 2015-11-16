<?php

require_once('header.php');

require_once('connection.php');

$login = utf8_decode($_POST['login']);
$senha = md5(utf8_decode($_POST['senha']));
$nivel = utf8_decode($_POST['nivel']);

$queryJogador = "SELECT id_jogador FROM jogador WHERE login = '$login' && senha = '$senha' LIMIT 1 "; 
$jogadorResult = mysql_fetch_array(mysql_query($queryJogador)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryJogador );
$id_jogador = $jogadorResult[0];

echo "id_jogador=" . $id_jogador;

$sqlUpdate = "UPDATE jogador SET ultimo_acesso = CURRENT_TIMESTAMP() WHERE id_jogador = $id_jogador ";
$query = mysql_query($sqlUpdate) or die ( "Query failed: " . mysql_error() . "<br/>" . $sqlUpdate );

require_once('select_pontuacoes.php');
 
?>