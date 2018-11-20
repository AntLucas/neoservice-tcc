<?php include_once("../assets/lib/dbconnect.php"); ?>



<?php
session_start();
$idcandidato =  utf8_encode($_SESSION['IdCandidato']);

$sql = mysqli_query($conn,"delete from tbcandidatos where idcandidato= $idcandidato");
session_destroy();
header("Location: loginCandidato.php")
?>