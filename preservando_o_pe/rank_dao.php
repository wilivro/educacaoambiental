<?php
//cabecalho padrao para a pagina php
require_once("header.php");


 class RankDAO
{
	var $sql ;
	var $db;
	var $conexao;
	var $resultado;
	function __construct()
	{
		$this->db = null;
		$this->resultado = null;
		$this->conexao = null;
		$this->sql = "";
	}
	function openConexao()
	{
		$this->conexao = mysql_connect("localhost","geranatal","g3r4n3g0c10n4t4l") or die ('Erro ao conectar ao MySQL: ' . mysql_error());
		$this->db = mysql_select_db("jogo_amazonia");
	}
	function closeConexao()
	{
		mysql_close($this->conexao);
		$this->sql = "";
	}
	function ValidaLogin($login,$senha)
	{
		if ($login == "adminfac" && $senha == "fac123")
		{
			return true;
		}else
		{
			return false;
		}
	}
	function VerificaRank()
	{
		$this->openConexao();
		
			$this->sql = "select j.login, p.pontuacao, j.ultimo_acesso from jogador j inner join pontuacao p  on j.id_jogador = 												p.id_jogador where p.nivel = 1 and j.ultimo_acesso > '2012-08-24 00:00:00' order by p.pontuacao desc";
					 
		 $this->resultado= mysql_query($this->sql);
		 
		 $linhas = mysql_num_rows($this->resultado);
		  
		 $this->closeConexao();
		
		return $linhas;
	}
	
	function ListaRank()
	{
		return $this->resultado;
	}
	
	
}
	

?>