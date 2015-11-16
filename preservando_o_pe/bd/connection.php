<?php
 
//constantes com os dados do db.
define('DB_NOME', 'jogo_pernambuco');
define('DB_USUARIO', 'geranatal');
//define('DB_SENHA', '');
define('DB_SENHA', 'g3r4n3g0c10n4t4l');
define('DB_HOST', 'localhost');
 
//conecta ao MySQL.
$conexao = mysql_connect(DB_HOST, DB_USUARIO, DB_SENHA) or die ('Erro ao conectar ao MySQL: ' . mysql_error());
//conectar ao db  'flashInteracao'.
$conexaoDb = mysql_select_db(DB_NOME, $conexao) or die ('Erro ao conectar a base de dados: ' . mysql_error());
 
?>