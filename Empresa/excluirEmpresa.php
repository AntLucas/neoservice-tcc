<?php include_once("../assets/lib/dbconnect.php"); 




session_start();
$idempresa=  utf8_encode($_SESSION['IdEmpresa']);
$sql = mysqli_query($conn,"delete from tbempresas where idempresa = $idempresa");

session_destroy();
header("Location: loginEmpresa.php")
?>