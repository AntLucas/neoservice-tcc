<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>

<?php

$Tuser = filter_input(INPUT_POST, "Tuser");
$Tsenha = filter_input(INPUT_POST, "Tsenha");
$Temail = filter_input(INPUT_POST, "Temail");
$TnomeEmp = filter_input(INPUT_POST, "TnomeEmp");
$Tcnpj = filter_input(INPUT_POST, "Tcnpj");
$Trazao = filter_input(INPUT_POST, "Trazao");
$Tcep = filter_input(INPUT_POST, "Tcep");
$Testado = $_POST['Testado'];
$Tcidade = filter_input(INPUT_POST, "Tcidade");
$Tbairro = filter_input(INPUT_POST, "Tbairro");
$Tendereco = filter_input(INPUT_POST, "Tendereco");
$Tnumero = filter_input(INPUT_POST, "Tnumero");
$Tcomplemento = filter_input(INPUT_POST, "Tcomplemento");


if ($con){
	
	echo "aa $Testado";
 $sql = @mysql_query("insert into TbEmpresas(NmUsuario,Senha,Email,NmEmpresa,CNPJ,Razao,CEP,Estado,Cidade,Bairro,Endereco,Numero,Complemento)
 values('$Tuser','$Tsenha','$Temail','$TnomeEmp','$Tcnpj','$Trazao',$Tcep,'$Testado','$Tcidade','$Tbairro','$Tendereco',$Tnumero,'$Tcomplemento')") or die (mysql_error());
}

else{
echo "Naooo";
}

?>