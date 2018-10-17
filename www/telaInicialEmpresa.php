<?php include_once("lib/dbconnect.php"); ?>
<?php 
session_start();
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>

<?php

$email = $_SESSION['Email'];
$senha = $_SESSION['Senha'];


$sql = mysql_query("select * from TbEmpresas  where Email = $email and Senha = $senha;");



echo"<br>Bem Vindo  ".$_SESSION['IdEmpresa'];
echo"<br>Bem Vindo  ".$_SESSION['NmUsuario'];
echo"<br>Bem Vindo  ".$_SESSION['NmEmpresa'];
echo"<br>Bem Vindo  ".$_SESSION['Email'];

echo"<br>Bem Vindo ".$_SESSION['Senha'];
?>


<html>

<head>
<title>Tela Inicial</title>
</head>

<body>
<a href ="../logoutEmpresa.php/">Sair</a>
<a href="../chatEmpresa.php/">chat</a>
</body>
</html>

