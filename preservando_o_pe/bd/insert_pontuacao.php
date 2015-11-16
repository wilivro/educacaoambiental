<?php

require_once('header.php');
 
//inclui o script de conexуo.
require_once('connection.php');
 
//resgatando os dados vindos do Flash e os converte para ISO-8859-1.
$id_jogador = utf8_decode($_POST['id_jogador']);
$pontuacao = utf8_decode($_POST['pontuacao']);
$nivel = utf8_decode($_POST['nivel']);
$id_prova = 105;
 
//sql responsсvel por inserir novos dados no db.
$sql = "INSERT INTO registro_jogo ( id_jogador,
									pontuacao,
									nivel,
									id_prova ) 
							VALUES ('$id_jogador',
									'$pontuacao',
									'$nivel',
									'$id_prova') ";
 
//atravщs da funчуo mysql_query() a sql щ executada.
$query = mysql_query($sql);
 
//retorna 1 (true) ou 0 (false), serс usado para verificar no Flash se o SQL foi completado com sucesso.
echo 'sucesso=' . $query;
 
?>