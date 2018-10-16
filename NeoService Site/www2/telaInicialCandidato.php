<?php include_once("lib/dbconnect.php"); ?>
<?php 
session_start();

?>

<?php

$email = $_SESSION['Email'];
$senha = $_SESSION['Senha'];


$sql = mysql_query("select * from TbCandidatos  where Email = '$email' and Senha = '$senha';")or die(mysql_error()); 



echo"<br>Bem Vindo  ".$_SESSION['IdCandidato'];
echo"<br>Bem Vindo  ".$_SESSION['NmUsuario'];
echo"<br>Bem Vindo  ".$_SESSION['NmCandidato'];
echo"<br>Bem Vindo  ".$_SESSION['Email'];

echo"<br>Bem Vindo ".$_SESSION['Senha'];
?>


<html>

<head>
<title>Tela Inicial</title>
</head>

<body>
<form class="pesquisa" method="post">
<input type="submit" value="Pesquisar"/>
<input type="search" name="pesquisa" id="texto"  placeholder="Pesquise por empresas..." list="historico"/>
<input type="hidden" name="env" value="pesquisar"/>
<datalist id="historico">
<?php
$sqli = mysql_query("select * from TbEmpresas;");
while($row = mysql_fetch_array($sqli)){
	$Usuario = $row['NmUsuario'];
echo"<option value='$Usuario'></option>";
}
?>
</datalist>
</form>
<a href ="../logoutCandidato.php/">Sair</a>
<a href="../chatCandidato.php/">chat</a>
<a href="../perfilCandidato.php">Perfil </a>
</body>
</html>


<?php
if(isset($_POST['env']) && $_POST['env'] == "pesquisar"){
	
	$_SESSION['pesquisa'] = $_POST['pesquisa'];
	header('Location: ../perfilDeEmpresa.php/');
}
else{

}

?>
