<?php

require_once('header.php');

//inclui o script de conex�o.
require_once('connection.php');

$licao = 0;

for($i = 0; $i < 420; $i++){
	
	$tablename = "questao";
	$next_increment = 0;
	$qShowStatus = "SHOW TABLE STATUS LIKE '$tablename'";
	$qShowStatusResult = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );

	$row = mysql_fetch_assoc($qShowStatusResult);
	$next_increment = $row['Auto_increment'];
	
	if($i % 42 == 0){
		$licao++;
	}
	
	//sql respons�vel por inserir novos dados no db.
	$sql = "INSERT INTO questao	(enunciado, licao, alternativa_1, alternativa_2, alternativa_3, alternativa_4, correta) 
						VALUES	('Quest�o', $licao, 'Correta', '', '', '', 1) ";
	 
	//atrav�s da fun��o mysql_query() a sql � executada.
	$query = mysql_query($sql);
}
 
?>