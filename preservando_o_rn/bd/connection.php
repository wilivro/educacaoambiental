<?php
 
//constantes com os dados do db.
define('DB_NOME', 'jogo_amazonia');
define('DB_USUARIO', 'root2');
//define('DB_SENHA', '');
define('DB_SENHA', 'GNWLENm45ql');
define('DB_HOST', 'localhost');
 
//conecta ao MySQL.
$conexao = mysql_connect(DB_HOST, DB_USUARIO, DB_SENHA) or die ('Erro ao conectar ao MySQL: ' . mysql_error());
//conectar ao db  'flashInteracao'.
$conexaoDb = mysql_select_db(DB_NOME, $conexao) or die ('Erro ao conectar a base de dados: ' . mysql_error());
 
?>