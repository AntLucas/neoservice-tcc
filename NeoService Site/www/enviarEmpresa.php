<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCCs',$con) or die (mysql_error());
?>

<?php
$IdContato = $_POST['$count'];
$mensagem=$_POST['mensagem'];

$sql = @mysql_query ("insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
values(1,1,null,'$mensagem')") or die (mysql_error());
?>
