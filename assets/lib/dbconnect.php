<?php 
/*$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('neoservice',$con) or die (mysql_error());*/
$servername = "localhost";
$database = "neoservice";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);


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