<?php

require_once('header.php');
 
//inclui o script de conexуo.
require_once('connection.php');
 
//resgatando os dados vindos do Flash e os converte para ISO-8859-1.
$id_jogador = utf8_decode($_POST['id_jogador']);
$id_questao_prova = utf8_decode($_POST['id_questao_prova']);
$area_desmatada = utf8_decode($_POST['area_desmatada']);
$area_preservada = utf8_decode($_POST['area_preservada']);
$poluicao_rio = utf8_decode($_POST['poluicao_rio']);
$especies = utf8_decode($_POST['especies']);
$acertos_primeira = utf8_decode($_POST['acertos_primeira']);
$acertos_segunda = utf8_decode($_POST['acertos_segunda']);
$acertos_terceira = utf8_decode($_POST['acertos_terceira']);
$fiscalizacao = utf8_decode($_POST['fiscalizacao']);
$ajudas = utf8_decode($_POST['ajudas']);
$respondidas = utf8_decode($_POST['respondidas']);
$respostas_certas_credito = utf8_decode($_POST['respostas_certas_credito']);
$erros_rio = utf8_decode($_POST['erros_rio']);
$erros_especies = utf8_decode($_POST['erros_especies']);
$creditos = utf8_decode($_POST['creditos']);
$tempo_jogo = utf8_decode($_POST['tempo_jogo']);
$pontuacao_nivel = utf8_decode($_POST['pontuacao_nivel']);
$pontuacao_rodada = utf8_decode($_POST['pontuacao_rodada']);
$nivel = utf8_decode($_POST['nivel']);
$grupo = utf8_decode($_POST['grupo']);
 
//sql responsсvel por inserir novos dados no db.
$sql = "INSERT INTO registro_jogo ( id_jogador,
									id_questao_prova,
									area_desmatada,
									area_preservada,
									poluicao_rio,
									especies,
									acertos_primeira,
									acertos_segunda,
									acertos_terceira,
									fiscalizacao,
									ajudas,
									respondidas,
									respostas_certas_credito,
									erros_rio,
									erros_especies,
									creditos,
									tempo_jogo,
									pontuacao_nivel,
									pontuacao_rodada,
									nivel,
									id_grupo_jogo)
							VALUES ($id_jogador,
									$id_questao_prova,
									$area_desmatada,
									$area_preservada,
									$poluicao_rio,
									$especies,
									$acertos_primeira,
									$acertos_segunda,
									$acertos_terceira,
									$fiscalizacao,
									$ajudas,
									$respondidas,
									$respostas_certas_credito,
									$erros_rio,
									$erros_especies,
									$creditos,
									$tempo_jogo,
									$pontuacao_nivel,
									$pontuacao_rodada,
									$nivel,
									$grupo) ";
 
//atravщs da funчуo mysql_query() a sql щ executada.
$query = mysql_query($sql);

//sql responsсvel por inserir novos dados no db.
$sqlQuestaoProva = "UPDATE questao_prova SET respondida = 1 WHERE id_questao_prova = $id_questao_prova ";
 
//atravщs da funчуo mysql_query() a sql щ executada.
$queryQuestaoProva = mysql_query($sqlQuestaoProva) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlQuestaoProva );
 
//retorna 1 (true) ou 0 (false), serс usado para verificar no Flash se o SQL foi completado com sucesso.
echo 'sucesso=' . $query;
 
?>