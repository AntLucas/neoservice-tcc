<?php

include_once("../assets/lib/dbconnect.php");

session_start();
$idcandidato =  utf8_encode($_SESSION['IdCandidato']);

$arquivo = $_FILES['arquivo']['name'];

echo"$arquivo";

$_UP['pasta'] = '../assets/images/fotos/';

$_UP['tamanho'] = 1024*1024*100;

$_UP['extensoes'] = array('png','jpg','jpeg', 'gif');

$_UP['renomeia'] = false;

$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'o arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'o arquivo ultrapassa o limite de tamanho';
$_UP['erros'][3] = 'o upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'não foi feito o upload do arquivo';

if($_FILES['arquivo']['error'] !=0){
	die("não foi possível fazer o upload");
	header('Location: editarPerfilCandidato.php');
	exit;
}

if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $arquivo)){
	$query= mysqli_query($conn,"update tbCandidatos set foto='$arquivo' where idcandidato = $idcandidato");
	header('Location: editarPerfilCandidato.php');
}
else{
	
	header('Location: editarPerfilCandidato.php');
}


?>