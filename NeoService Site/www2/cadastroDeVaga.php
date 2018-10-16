<?php include_once("lib/dbconnect.php"); ?>

<?php
/*ini_set('display_errors', 0 );
error_reporting(0);*/
session_start();
$idemp = $_SESSION['IdEmpresa'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Cadastro de vaga</title>
<link rel="stylesheet" type="text/css" href="EstiloMenu.css"/>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
</head>
<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>



	

<form method="POST" id="CadastroEmpresa" action="">
<fieldset>
<legend id="Titulo"> Cadastro de de vaga</legend>


		
  <p><label for="Cvaga">Vaga: </label><input type="text" name="tvaga"  size="20" maxlength="30" placeholder="Nome da vaga"required/></p>
  <p><label for="Csenha">Salario: </label><input type="text" name="tsalario"  size="16" maxlength="16" required/></p>
  <p><label for="Cemail">Horário: </label><input type="text" name="thorario" id="Cemail" size="20" maxlength="40" required/></p>
		<input id="CBotaoCadastrar" type="submit" value="Cadastrar" >
		<input type="hidden" name="env" value="cad">
        <input id="CBotaoLimpar" type="reset" value="Limpar"/>
        </fieldset>
</form>

<a href="../telaInicialEmpresa.php">Tela Inicial</a>


</body>
</html>


<?php
	if($_POST['env'] && $_POST['env'] == "cad"){
		if($_POST['tvaga'] || $_POST['tsalario'] || $_POST['thorario'] ){
			$tvaga = $_POST['tvaga'];
			$tsalario = $_POST['tsalario'];
			$thorario = $_POST['thorario'];
			
			
	
	$sqli = mysql_query("select * from TbVagas where vaga = '$tvaga'")or die (mysql_error());
	
	if(mysql_num_rows($sqli)>=1){
		
	echo "<div class='alert alert-danger'>Esse vaga já foi cadastrada!</div>";
		
		
	}
	
	
	

	else{
		
	
	
		$sql = @mysql_query("insert into TbVagas(fk_IdEmpresa,vaga,salario,horario)
		values('$idemp','$tvaga','$tsalario','$thorario');") or die (mysql_error());
 
	
	echo"Vaga cadastrada com sucesso!.";
	
 
	}
		}
	}

?>