<?php include_once("lib/dbconnect.php"); ?>

<?php
/*ini_set('display_errors', 0 );
error_reporting(0);*/
session_start();
$idcand = $_SESSION['IdCandidato'];
?>

<html>
<head>
<title>Cadastro de competência</title>
<link rel="stylesheet" type="text/css" href="EstiloMenu.css"/>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
</head>
<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>



	

<form method="POST" id="CadastroEmpresa" action="">
<fieldset>
<legend id="Titulo"> Cadastro de Competência</legend>


		
  <p><label for="Cvaga">Compêtencia: </label><input type="text" name="competencia"  size="20" maxlength="30" placeholder="Nome da vaga"required/></p>

		<input id="CBotaoCadastrar" type="submit" value="Cadastrar" >
		<input type="hidden" name="env" value="cad">
        <input id="CBotaoLimpar" type="reset" value="Limpar"/>
        </fieldset>
</form>

<a href="../telaInicialCandidato.php">Tela Inicial</a>


</body>
</html>


<?php
	if($_POST['env'] && $_POST['env'] == "cad"){
		if($_POST['competencia'] ){
			$competencia = $_POST['competencia'];
		
			
			
	
	$sqli = mysql_query("select * from TbCompetencias where competencia = '$competencia'")or die (mysql_error());
	
	if(mysql_num_rows($sqli)>=1){
		
	echo "<div class='alert alert-danger'>Essa competência já foi cadastrada!</div>";
		
		
	}
	
	
	

	else{
		
	
	
		$sql = @mysql_query("insert into TbCompetencias(fk_IdCandidato,competencia)
values('$idcand','$competencia');") or die (mysql_error());
 
	
	echo"Competência adicionada!.";
	
 
	}
		}
	}

?>



