<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>

<html>
<head>
<title>Autenticando Candidato</title>

<script type ="text/javascript">
function loginsuccefully(){
	setTimeout("window.location='telaInicialCandidato.php'",5000);
}


function loginfailed(){
	setTimeout("window.location='loginCandidato.php'",5000);
}
</script>
</head>
<body>


<?php
$email = $_POST['Temail'];
$senha = $_POST['Tsenha'];

$sql= mysql_query("select b.Email,b.Senha from tbcandidatos b where Email = '$email' and Senha = '$senha';")or die(mysql_error()); 

$row = mysql_num_rows($sql);

if($row >0){
	session_start();
	$_SESSION['Temail']=$_POST['Temail'];
	$_SESSION['Tsenha']=$_POST['Tsenha'];
	echo"Você foi autenticado com sucesso! Aguarde um instante";
	echo "<script>loginsuccefully()</script>";
}
else{
	echo"<center>Email ou senha inválidos! Aguarde um instante para tentar novamente</center>";
	echo "<script>loginfailed()</script>";
}
?>
</body>
</html>