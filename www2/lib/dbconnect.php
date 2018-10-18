<?php 
$host = 'neoservice.mysql.uhserver.com';
$user = 'neoservice';
$pass = 'Nsrvce{69}';
$database = 'neoservice';
mysql_connect($host, $user, $pass) or die('Não foi possível conectar');
mysql_select_db($database) or die('Não foi possível conectar com o banco de dados');
echo 'Banco de dados conectado com sucesso';
?>

<?php
date_default_timezone_set('America/Sao_Paulo');
$globalData = date("d/m/Y");
$globalHora = date("H:i");
$showNome = false;

if(isset($_SESSION['Email']) && $_SESSION['Email'] !=null){
	$nomeAtual = $_SESSION['nome'];
	$usuarioAtual = $_SESSION['Email'];
	$showNome = true;
}
?>
