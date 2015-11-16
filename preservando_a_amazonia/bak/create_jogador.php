<?php

require_once('header.php');

//inclui o script de conexão.
require_once('connection.php');

$login = utf8_decode($_POST['login']);
$senha = md5(utf8_decode($_POST['senha']));

// JOGADOR //

//Pega o index do próximo jogador
$tablename = "jogador";
$id_jogador = 0;
$qShowStatus = "SHOW TABLE STATUS LIKE '$tablename'";
$qShowStatusResult = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);
$id_jogador = $row['Auto_increment'];

echo "id_jogador=" . $id_jogador;

//Insere o novo jogador
$sql = "INSERT INTO jogador	(login, email, senha) 
					VALUES	('$login', null, '$senha') ";
$query = mysql_query($sql);	


// PROVA //

$queryCountProva = "SELECT count(*) as count FROM prova WHERE id_jogador is null"; 
$provasResult = mysql_fetch_array(mysql_query($queryCountProva)) or die( "Query failed: " . mysql_error() . "<br/>" . $queryCountProva );
$provasCount = $provasResult[0];

if($provasCount == 0){
	require_once('generate_provas.php');
}

//Pega o index da prova a ser sorteada para o usuário
$queryProva = "SELECT id_prova FROM prova WHERE id_jogador is null ORDER BY RAND() LIMIT 1 "; 
$prova = mysql_fetch_array(mysql_query($queryProva)) or die ( "Query failed: " . mysql_error() . "<br/>" . $queryProva );

//Insere nova prova 
$sqlProva = "UPDATE prova SET id_jogador = $id_jogador WHERE id_prova = $prova[0] ";
$query = mysql_query($sqlProva) or die ( "Query failed: " . mysql_error() . "<br/>" . $sqlProva );
 
?>