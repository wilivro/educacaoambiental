<?php

require_once('header.php');

require_once('connection.php');

$id_jogador = utf8_decode($_POST['id_jogador']);
$nivel = utf8_decode($_POST['nivel']);
$grupo = utf8_decode($_POST['grupo']);
$has_grupo = ($grupo != "false");

$sqlSelect = "SELECT * 	FROM registro_jogo
						WHERE id_jogador = $id_jogador && nivel = $nivel && id_grupo_jogo = $grupo 
						ORDER BY id_registro_jogo DESC 
						LIMIT 1 ";

$selectResult = mysql_query($sqlSelect) or die( "Query failed: " . mysql_error() . "<br/>" . $sqlSelect );
$result = mysql_fetch_array($selectResult);

echo "id_registro_jogo=" . $result['id_registro_jogo'];
echo "&id_jogador=" . $id_jogador;
echo "&id_questao_prova=" . $result['id_questao_prova'];
echo "&area_desmatada=" . $result['area_desmatada'];
echo "&area_preservada=" . $result['area_preservada'];
echo "&poluicao_rio=" . $result['poluicao_rio'];
echo "&especies=" . $result['especies'];
echo "&acertos_primeira=" . $result['acertos_primeira'];
echo "&acertos_segunda=" . $result['acertos_segunda'];
echo "&acertos_terceira=" . $result['acertos_terceira'];
echo "&fiscalizacao=" . $result['fiscalizacao'];
echo "&ajudas=" . $result['ajudas'];
echo "&respondidas=" . $result['respondidas'];
echo "&respostas_certas_credito=" . $result['respostas_certas_credito'];
echo "&erros_rio=" . $result['erros_rio'];
echo "&erros_especies=" . $result['erros_especies'];
echo "&creditos=" . $result['creditos'];
echo "&tempo_jogo=" . $result['tempo_jogo'];
echo "&pontuacao_nivel=" . $result['pontuacao_nivel'];
echo "&pontuacao_rodada=" . $result['pontuacao_rodada'];
echo "&nivel=" . $nivel;
 
?>