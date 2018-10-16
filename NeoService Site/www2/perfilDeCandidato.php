<?php include_once("lib/dbconnect.php"); ?>
<?php
session_start();
$perfil = $_SESSION['pesquisa'];
$fkid = $_SESSION['IdEmpresa'];
$sql = mysql_query("select * from TbCandidatos where NmUsuario = '$perfil'")or die(mysql_error());
$rows = mysql_num_rows($sql) or die(mysql_error()); 
$existe = 0;

if($rows >=1){
	while($row = mysql_fetch_array($sql)){
	$nomecan= $row['NmCandidato'];
	$idcand = $row['IdCandidato'];
	$existe +=1;
	}
}
else{
	echo"aaaa";
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
	echo"perfil de $nomecan";
	

}

else{
	echo"<center>Candidato pesquisado não existe</center><br>";
	
	
}
	
	$sqlil = mysql_query("select * from TbContatos where fk_IdCandidato = '$idcand' and fk_IdEmpresa='$fkid'")or die(mysql_error());
	$echo = mysql_num_rows($sqlil);
	
	if($echo>=1){
		echo"Você já iniciou contato com esse candidato";
	}
	else{
		?>
		<form method="POST" >
		<input type="submit" name="a" value="iniciar contato"/>
		<input type="hidden" name="env" value="enviou"/>
		</form>
		<?php
	}

?>
<form action='../telaInicialEmpresa.php'><input type='submit' value='Voltar'/></form>
</body>
</html>

<?php
if(isset($_POST['env']) && $_POST['env'] == "enviou"){
	if(mysql_query("insert into TbContatos(fk_IdEmpresa,fk_IdCandidato) values('$fkid','$idcand')")){
		
		header('Location: ../chatEmpresa.php/');
	
}
else{
echo"nao foi dessa vez";
}
}
?>