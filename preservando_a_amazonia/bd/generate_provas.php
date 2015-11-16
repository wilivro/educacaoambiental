<?php

require_once('header.php');

//inclui o script de conexão.
require_once('connection.php');

for($i = 0; $i < 50; $i++){
	
	$tablename = "prova";
	$next_increment = 0;
	$qShowStatus = "SHOW TABLE STATUS LIKE '$tablename'";
	$qShowStatusResult = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );

	$row = mysql_fetch_assoc($qShowStatusResult);
	$next_increment = $row['Auto_increment'];
	
	//sql responsável por inserir novos dados no db.
	$sql = "INSERT INTO prova	() 
						VALUES	() ";
	 
	//através da função mysql_query() a sql é executada.
	$query = mysql_query($sql);
	
	$questoes = array();
	
	$licao = 0;
	
	for($licao = 1; $licao <= 10; $licao++){
		$sqlQuestoes = "SELECT id_questao 	FROM questao
											WHERE licao = $licao 
											ORDER BY RAND()
											LIMIT 14 ";
		
		$queryQuestoes = mysql_query($sqlQuestoes);
		
		while($q = mysql_fetch_array($queryQuestoes)){
			$questoes[] = $q['id_questao'];
		}
	}
	
	for($j = 0; $j < count($questoes); $j++){
		if(($j % 14) < 3){
			$nivel = 1;
		}else if(($j % 14) < 8){
			$nivel = 2;
		}else{
			$nivel = 3;
		}
		
		//sql responsável por inserir novos dados no db.
		$sqlQuestaoProva = "INSERT INTO questao_prova	(id_questao, id_prova, nivel) 
												VALUES	($questoes[$j], $next_increment, $nivel) ";
		 
		//através da função mysql_query() a sql é executada.
		$queryQuestaoProva = mysql_query($sqlQuestaoProva);
	}
}
 
?>