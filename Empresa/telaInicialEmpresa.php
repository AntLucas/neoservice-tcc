<?php include_once("../assets/lib/dbconnect.php"); ?>


<?php

$email = $_SESSION['Email'];
$senha = $_SESSION['Senha'];


$sql = mysql_query("select * from TbEmpresas  where Email = $email and Senha = $senha;");



echo"<br>Bem Vindo  ".$_SESSION['IdEmpresa'];
echo"<br>Bem Vindo  ".$_SESSION['NmUsuario'];
echo"<br>Bem Vindo  ".$_SESSION['NmEmpresa'];
echo"<br>Bem Vindo  ".$_SESSION['Email'];

echo"<br>Bem Vindo ".$_SESSION['Senha'];

$fkid =$_SESSION['IdEmpresa'];
?>


<html>

<head>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<title>Tela Inicial</title>
</head>

<body>

<form class="pesquisa" method="post">
<input type="submit" value="Pesquisar"/>
<input type="search" name="pesquisa" id="texto"  placeholder="Pesquise por candidatos..." list="historico"/>
<input type="hidden" name="env" value="pesquisar"/>
<datalist id="historico">
<?php
$sqli = mysql_query("select * from TbCandidatos;");
while($row = mysql_fetch_array($sqli)){
	$Usuario = $row['NmUsuario'];
echo"<option value='$Usuario'></option>";
}
?>
</datalist>
</form>


<?php
$sqli = mysql_query("select * from TbCandidatos;");
while($row = mysql_fetch_array($sqli)){
	$Usuario = $row['NmUsuario'];
echo"<option value='$Usuario'></option>";
}
?>
</datalist>
</form>
<?php

$slq = mysql_query("select a.NmCandidato,
a.IdCandidato,
b.NmEmpresa,
b.IdEmpresa,
c.IdSolicitacao

from tbcandidatos a
inner join tbsolicitacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbempresas b
on b.IdEmpresa = c.fk_IdEmpresa");
echo"Notificações";

while($lc = @mysql_fetch_array($slq) ){
	$idemp = $lc['IdEmpresa'];
	$idcand = $lc['IdCandidato'];
	$idsoli = $lc['IdSolicitacao'];
	$nmcandidato = $lc['NmCandidato'];
	$nmempresa= $lc['NmEmpresa'];
	
	$sqlil = mysql_query("select * from TbContatos where fk_IdCandidato = '$idcand' and fk_IdEmpresa='$fkid'");
	$echo = mysql_num_rows($sqlil);
	
	if($echo>=1){
	
	}
		
	else{
	
	?>
	<form method="Post">
	<input type="hidden" name="pegar" value="<?php echo"$idcand";?>"/>
	<input type="submit" name="a" value="iniciar contato"/>
	<input type="hidden" name="env2" value="clicou"/>
	
	</form>
	<?php
	echo"<br>$idsoli $nmempresa $nmcandidato <br>";
	
	}
}
	


?>
<a href ="logoutEmpresa.php">Sair</a>
<a href="chatEmpresa.php">chat</a>
<a href="cadastroDeVaga.php">cadastrar vaga</a>
<a href="perfilEmpresa.php">Perfil</a>
<a href="notificacoes.php">notificações</a>
</body>
</html>

<?php
$iddocan = $_POST["pegar"];


if(isset($_POST['env2']) && $_POST['env2'] == "clicou"){
	
	$sqlil = mysql_query("select * from TbContatos where fk_IdCandidato = '$iddocan' and fk_IdEmpresa='$fkid'");
	$echo = mysql_num_rows($sqlil);
	
	if($echo>=1){
		
	}
	else{
	if(mysql_query("insert into TbContatos(fk_IdEmpresa,fk_IdCandidato) values('$fkid','$iddocan')")){
		
		header('Location: chatEmpresa.php');
	}
	else{
		echo"Erro ao iniciar Contato";
	}
	}
}
else{
	
}

?>
<?php
if(isset($_POST['env']) && $_POST['env'] == "pesquisar"){
	
	$_SESSION['pesquisa'] = $_POST['pesquisa'];
	header('Location: perfilDeCandidato.php');
}
else{

}

?>




