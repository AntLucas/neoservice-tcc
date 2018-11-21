<?php include_once("../assets/lib/dbconnect.php"); 

session_start();

$id = $_POST["pegar"];
$idempresa=  utf8_encode($_SESSION['IdEmpresa']);


	if(mysqli_query($conn,"insert into tbcontatos (fk_IdEmpresa,fk_IdCandidato)values($idempresa,$id)")){
		$sqlill = mysqli_query($conn,"delete from TbSolicitacao where fk_IdCandidato = '$id' and fk_IdEmpresa='$idempresa'");
									header('Location: chatEmpresa.php');
								}
								else{
									echo"falha ao iniciar contato";
									header('Location: perfilEmpresa.php');
								}


?>