<?php

require_once('header.php');
require_once('connection.php');

$id_jogador = utf8_decode($_POST['id_jogador']);
$nivel = utf8_decode($_POST['nivel']);
$continuar = utf8_decode($_POST['continuar']);

$queryProva = "SELECT id_prova FROM prova WHERE id_jogador = $id_jogador ";

$provasResult = mysql_fetch_array(mysql_query($queryProva)) or die(mysql_error());
$prova = $provasResult[0];

echo "prova=" . $prova;

if($continuar != "true"){
	$queryUpdateIniciar = "UPDATE questao_prova SET respondida = 0 " .
						" WHERE id_prova = $prova && nivel = $nivel ";
						
	$result = mysql_query($queryUpdateIniciar) or die(mysql_error());
}

$queryQuestoes = "SELECT * FROM questao " .
					" NATURAL JOIN questao_prova " .
					" WHERE id_prova = $prova && nivel = $nivel "  .
					($continuar == "true" ? " && respondida = 0 " : " " ) . 
					" ORDER BY questao.id_questao "; 

$result = mysql_query($queryQuestoes) or die(mysql_error());

$countPerguntas = 0;

while($row = mysql_fetch_array($result)){ 
	echo "&enunciado[]=" . $row['enunciado'];
	echo "&alternativa1[]=" . $row['alternativa_1'];
	echo "&alternativa2[]=" . $row['alternativa_2'];
	echo "&alternativa3[]=" . $row['alternativa_3'];
	echo "&alternativa4[]=" . $row['alternativa_4'];
	echo "&correta[]=" . $row['correta'];
	echo "&id_questao_prova[]=" . $row['id_questao_prova'];
	echo "&id_questao[]=" . $row['id_questao'];
	echo "&licao[]=" . $row['licao'];
	
	$countPerguntas++;
}

echo "&quant_perguntas=" . $countPerguntas;
 
?>