<?php
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}
echo 'Conexão bem sucedida';
mysqli_close($link);
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