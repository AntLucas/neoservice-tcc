<?php include_once("lib/dbconnect.php"); ?>

<?php
session_start();
$idcand = $_SESSION['IdCandidato'];
$perfil = $_SESSION['pesquisa'];
$sql = mysql_query("select * from TbEmpresas where NmUsuario = '$perfil'")or die(mysql_error());
$rows = mysql_num_rows($sql) or die(mysql_error()); 
$existe = 0;

if($rows >=1){
	while($row = mysql_fetch_array($sql)){
	$nomeemp= $row['NmEmpresa'];
	$idemp= $row['IdEmpresa'];
	}
	
	$existe +=1;
}
else{
	
}
?>
<html>
<head>
<title><?php 
if($rows >=1){
echo "Perfil de $perfil";
}
else{
	echo "Perfil não existe!";
}
?></title>
</head>
<body>
<?php
if($rows >=1){
	echo"perfil de $nomeemp";
	
	echo"<br>$perfil";
	
	$sqlil = mysql_query("select * from TbSolicitacao where fk_IdCandidato = '$idcand' and fk_IdEmpresa='$idemp'");
	$echo = mysql_num_rows($sqlil);
	
	if($echo>=1){
		echo"<br>voce já solicitou contato com essa empresa";
	}
	else{
?>

<form method="post">
<input type="submit"/>
<input type="hidden" name="env" value="solicitar"/>
</form>
<?php
	}
?>
<?php
}

else{
	echo"<center>Empresa pesquisada não existe</center><br>";
	
	
}

?>
<form action='telaInicialCandidato.php'><input type='submit' value='Voltar'/></form>

</body>
</html>

<?php
if(isset($_POST['env']) && $_POST['env'] == "solicitar"){
	
	
	
	
	$sqlil = mysql_query("select * from TbSolicitacao where fk_IdCandidato = '$idcand' and fk_IdEmpresa='$idemp'");
	$echo = mysql_num_rows($sqlil);
	
	if($echo>=1){
		echo"voce já solicitou contato com essa empresa";
	}
	else{
	if(mysql_query("insert into TbSolicitacao(fk_IdEmpresa,fk_IdCandidato) values('$idemp','$idcand')")){
		echo"enviado com sucesso";
	}	
	else{
		echo"erro ao enviar solicitação";
	}
	}
	
}


?>