<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>
<?php
$Tid = $_POST['Tid'];




if($con){
	echo "Excluido com sucesso";
	$sql = @mysql_query("DELETE FROM TbEmpresas where IdEmpresa = '$Tid'")or die (mysql_error());
	header("Location: loginEmpresa.php");
}
else{
	echo"Erro ao excluir";
}
?>