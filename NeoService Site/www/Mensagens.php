<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>
<html>
<head>
	<title>Escolhendo a mensagem</title>
	
</head>
<body>

	<div class="container">
		<div class="superior">
		
		
		<!-- PHP
		$count = 1;
		$nc = @mysql_query("select a.NmEmpresa,
		b.NmCandidato

		from TbEmpresas a
		inner join TbContatos c
		on a.IdEmpresa = c.fk_IdEmpresa
		inner join TbCandidatos b
		on b.IdCandidato = c.fk_IdCandidato where a.IdEmpresa = 1;");
		while($lc = @mysql_fetch_array($nc)){
			$empresa = $lc['NmEmpresa'];
			$candidato = $lc['NmCandidato'];
		
			
			echo "<br><form class='escolha' method='post' action='chatEmpresa.php' ><input id='CBotaoLimpar' type='submit' action='chatEmpresa.php'/><label for='CBotaoLimpar' value ='$count'> $empresa $candidato</label> </form>";
			$count +=1;
		}
		-->
		
		
		

	<form class="escolha" method="post" action="chatEmpresa.php">	
	<input type="submit" value="Empresa">
	</form>	
	
	<form class="escolha" method="post" action="chatCandidato.php">	
	<input type="submit" value="Candidato">
	</form>	
		</div>
		</div>
		
</body>
</html>