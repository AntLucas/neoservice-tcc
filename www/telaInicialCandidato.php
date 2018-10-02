<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>

<?php
session_start();
if(!isset($_SESSION["Temail"]) || !isset ($_SESSION["Tsenha"])){
	header("Location: loginCandidato.php");
	exit;
}

else{
	echo"<center>Você está logado!</center>";
}
?>


<html>

<head>
<title>Tela Inicial</title>
</head>

<body>
<a href ="Logout.php">Sair</a>
</body>
</html>