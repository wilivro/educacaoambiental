<?php

//require_once('header.php');
//require_once('connection.php');

//$id_jogador = utf8_decode($_POST['id_jogador']);
//$nivel = utf8_decode($_POST['nivel']);
$grupo_jogo = utf8_decode($_POST['grupo']);

$sqlNivel1 = "SELECT * 	FROM pontuacao
						WHERE id_jogador = $id_jogador && nivel = 1 && id_grupo_jogo = $grupo_jogo 
						ORDER BY id_pontuacao DESC 
						LIMIT 1 ";
						
$sqlNivel2 = "SELECT * 	FROM pontuacao
						WHERE id_jogador = $id_jogador && nivel = 2 && id_grupo_jogo = $grupo_jogo 
						ORDER BY id_pontuacao DESC 
						LIMIT 1 ";

$sqlNivel3 = "SELECT * 	FROM pontuacao
						WHERE id_jogador = $id_jogador && nivel = 3 && id_grupo_jogo = $grupo_jogo 
						ORDER BY id_pontuacao DESC 
						LIMIT 1 ";

$queryNivel1 = mysql_query($sqlNivel1) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlNivel1 );
$queryNivel2 = mysql_query($sqlNivel2) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlNivel2 );
$queryNivel3 = mysql_query($sqlNivel3) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlNivel3 );
						
$resultNivel1 = mysql_fetch_array($queryNivel1);
$resultNivel2 = mysql_fetch_array($queryNivel2);
$resultNivel3 = mysql_fetch_array($queryNivel3);

echo "&pontuacao_nivel_1=" . $resultNivel1['pontuacao'];
echo "&pontuacao_nivel_2=" . $resultNivel2['pontuacao'];
echo "&pontuacao_nivel_3=" . $resultNivel3['pontuacao'];

$sqlRanking = "SELECT pontuacao, login FROM pontuacao
						RIGHT JOIN jogador ON pontuacao.id_jogador = jogador.id_jogador
						WHERE pontuacao.nivel = 0 && id_grupo_jogo = $grupo_jogo 
						ORDER BY pontuacao.pontuacao DESC 
						LIMIT 50 ";

$resultRanking = mysql_query($sqlRanking) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlRanking );

$quantidadePontuacoes = 0;

while($row = mysql_fetch_array($resultRanking)){
	echo "&pontuacao_ranking[]=" . $row['pontuacao'];
	echo "&nome_jogador_ranking[]=" . $row['login'];
	
	$quantidadePontuacoes++;
}

echo "&quantidade_pontuacoes=" . $quantidadePontuacoes;
 
?>