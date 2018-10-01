<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>
<html>
<head>
	<title>Chat Candidato</title>
	
	<link rel="stylesheet" type="text/css" href="css/chat.css">
		<script type ="text/javascript">
		function Nova(){
			setTimeout("window.location='chatCandidato.php'",10);
		}
		</script>
</head>
<center>
<body>
<input type="checkbox" id="bt_menu">
	
	<div class="container">
		<div class="superior">
		<?php
		$nc = @mysql_query("select a.NmEmpresa,
		b.NmCandidato,
		c.fk_IdEmpresa,
		c.fk_IdCandidato,
		c.Mensagem,
		d.IdContato

		from TbEmpresas a inner join
		tbcontatos d
		on a.IdEmpresa = d.fk_IdEmpresa
		inner join TbCandidatos b 
		on b.IdCandidato = d.fk_IdCandidato
		inner join TbMensagens c
		on c.fk_idcontato = d.idcontato
		where d.IdContato = 1;");
		
		
		
		while($lc = @mysql_fetch_array($nc) ){
			$ide = $lc['fk_IdEmpresa'];
			$idc = $lc['fk_IdCandidato'];
			$a = $lc['NmEmpresa'];
			$b = $lc['NmCandidato'];
			$mensagem = $lc ['Mensagem'];
			
			 if($ide == null ){
				echo "<br>  $b  : $mensagem";
			 }
			
			if($ide == 1 ){
				echo "<br> $a : $mensagem";
			}
			

				
		}
		
		
		?>
		
		
		
		</div>
		
		<div class="campos">
		<form action="enviarCandidato.php" method="post">
		<input type="text" name="mensagem" placeholder="Mensagens">
		<input type="submit" name="enviar" onclick="Nova()">
		</form>
		</div>
	</div>
	</center>
</body>
</html>
