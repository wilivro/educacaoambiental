<?php

require_once('header.php');

require_once('connection.php');

$id_jogador = utf8_decode($_POST['id_jogador']);
$pontuacao = utf8_decode($_POST['pontuacao']);
$nivel = utf8_decode($_POST['nivel']);
$id_prova = utf8_decode($_POST['id_prova']);
$grupo_jogo = utf8_decode($_POST['grupo']);
$has_grupo = ($grupo_jogo != "false");

$queryCountPontuacao = "SELECT count(*) FROM pontuacao WHERE id_jogador = $id_jogador && id_prova = $id_prova && nivel = $nivel && id_grupo_jogo = $grupo_jogo ";
$countPontuacaoResult = mysql_fetch_array(mysql_query($queryCountPontuacao)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryCountPontuacao );
$existe = $countPontuacaoResult[0];

if($existe > 0){
	$sql = "UPDATE pontuacao 	SET pontuacao = $pontuacao
								WHERE id_jogador = $id_jogador && id_prova = $id_prova && nivel = $nivel && id_grupo_jogo = $grupo_jogo ";
	
	$query = mysql_query($sql) or die ( "Query failed: " . mysql_error() . "<br/>" . $sql );
}else{
	$sql = "INSERT INTO pontuacao ( id_jogador,
									pontuacao,
									nivel, 
									id_grupo_jogo, 
									id_prova ) 
							VALUES ($id_jogador,
									$pontuacao,
									$nivel, 
									$grupo_jogo, 
									$id_prova) ";
	
	$query = mysql_query($sql) or die ( "Query failed: " . mysql_error() . "<br/>" . $sql );
}

$queryCountPontuacao = "SELECT count(*) FROM pontuacao WHERE id_jogador = $id_jogador && id_prova = $id_prova " + 
									($has_grupo ? " && id_grupo_jogo = $grupo_jogo " : " ");
$countPontuacaoResult = mysql_fetch_array(mysql_query($queryCountPontuacao)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryCountPontuacao );
$pontuacoes = $countPontuacaoResult[0];

if($pontuacoes >= 3){
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
	 
	$resultNivel1 = mysql_fetch_array(mysql_query($sqlNivel1)) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlNivel1 );
	$resultNivel2 = mysql_fetch_array(mysql_query($sqlNivel2)) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlNivel2 );
	$resultNivel3 = mysql_fetch_array(mysql_query($sqlNivel3)) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlNivel3 );

	$pontuacao = $resultNivel1['pontuacao'] + $resultNivel2['pontuacao'] + $resultNivel3['pontuacao'];
	
	if($pontuacoes == 4){
		$sql = "UPDATE pontuacao 	SET pontuacao = $pontuacao
									WHERE id_jogador = $id_jogador && id_prova = $id_prova && nivel = 0 && id_grupo_jogo = $grupo_jogo ";
		
		$query = mysql_query($sql) or die ( "Query failed: " . mysql_error() . "<br/>" . $sql );
	}else if($pontuacoes == 3){
		$sql = "INSERT INTO pontuacao ( id_jogador,
										pontuacao,
										nivel,
										id_grupo_jogo,
										id_prova ) 
								VALUES ($id_jogador,
										$pontuacao,
										0, 
										$id_grupo_jogo, 
										$id_prova) ";
		
		$query = mysql_query($sql) or die ( "Query failed: " . mysql_error() . "<br/>" . $sql );
	}
}
 
?>