<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel=STYLESHEET href="estiloLogin.css" type="text/css">
<title>Rank  da competição do Meio Ambiente</title>
</head>
<body>

		<div class = "formulario">
            <div class = "top1">";
            <img src= "img/logoFac.png">
            </div>        
            <div class = "top2">";
            <img src= "img/turismo.png">;
            </div>
             <h1> Rank </h1>;
                       
            <div style="padding: 23px;
                        repeat center;
                        overflow: auto; 
                        position: relative;
                        background:#FFF;
                        top:80px;
                        left:200px;
                        height: 350px; width:370px">

				<?php
                require_once("rank_dao.php");
                
                $dao = new RankDAO();
                $login = $_POST["login"];
                $senha = $_POST["senha"];
                $rank;
                $cont = 0 ;
                $linhas = 0;
                $login;
                $pontos;
                
                if ($dao->ValidaLogin($login,$senha))
                {
                    if ($dao->VerificaRank()>0)
                    {
						
                        $rank = $dao->ListaRank();
                        $linhas = mysql_num_rows($rank);
                
                       
                       
                        
                        echo "<table border=\"1\" bordercolor=\"#999999\">";
                        echo  	"<tr>";
                        echo    	"<th>LOGIN</th>";
                        echo    	"<th>PONTUAÇÃO</th>";
                        echo    	"<th>RANK</th>";
                        echo 	"</tr>";
                        
                        while ($cont < $linhas)
                        {
                            $login = mysql_result($rank,$cont,0);
                            $pontos = mysql_result($rank,$cont,1);
                            
                            echo "<tr>";
                            echo 	"<td>".$login."</td>";
                            echo 	"<td>".$pontos."</td>";
                            echo	"<td>".($cont + 1)."</td>";
                            echo "</tr>";
                            
                            $cont++;
                        }
                        
                            
                        echo "</table>";
                  
                        
                    }else
                    {
						echo "nao tem rank";
						echo"<h1> NÃO HÁ DADOS A SEREM EXIBIDOS</h1>";
                        
                    }
                    
                }
                ?>
	</div>
</div>

</body>
</html>