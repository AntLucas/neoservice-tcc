<?php include_once("lib/dbconnect.php"); 
session_start();
$idcandidato = $_SESSION['IdCandidato'];
$sql = mysql_query("SELECT * FROM TbCandidatos where IdCandidato = '$idcandidato'");
$dados = mysql_fetch_assoc($sql);
?>
<?php echo $dados['NmCandidato'];?>

<html>
<head></head>
<body>
<form method="post">
<label>Nome de usuário</label>
<input type="text" name="nomeu" value="<?php echo $dados['NmUsuario'];?>" required><br>

<label>Senha</label>
<input type="password" name="senha" value="<?php echo $dados['Senha'];?>" required><br>

<label>Nome do candidato</label>
<input type="text" name="nomec" value="<?php echo $dados['NmCandidato'];?>"><br>

<label>E-mail</label>
<input type="email" name="email" value="<?php echo $dados['Email'];?>"required><br>


<label>Celular</label>
<input type="text" name="celular" value="<?php echo $dados['cel'];?>"required><br>


<label>Endereço</label>
<input type="text" name="endereco" value="<?php echo $dados['ende'];?>"required><br>


<label>Biografia</label>
<input type="text" name="biografia" value="<?php echo $dados['biografia'];?>"required><br>


<label>Experiências</label>
<input type="text" name="experiencias" value="<?php echo $dados['xp'];?>"required><br>


<label>Inglês</label>
<input type="text" name="ingles" value="<?php echo $dados['ingles'];?>"required><br>


<label>Formação</label>
<input type="text" name="formacao" value="<?php echo $dados['formacao'];?>"required><br>


<label>Profissão</label>
<input type="text" name="profissao" value="<?php echo $dados['profissao'];?>"required><br>


<input type="submit" value="Alterar dados">
<input type="hidden" name ="env" value="altera">
</form>
<a href="perfilCandidato.php">Voltar</a>
</body>
</html>

<?php
if($_POST['env'] && $_POST['env'] == "altera"){
	if($_POST['nomeu'] && $_POST['senha'] && $_POST['nomec'] && $_POST['email'] && $_POST['celular'] && $_POST['endereco'] && $_POST['biografia'] && $_POST['experiencias'] && $_POST['ingles'] && $_POST['formacao'] && $_POST['profissao'] ){

	
	
	
	
	$nomeu =	$_POST['nomeu'];
	$senha =	$_POST['senha'];
	$nomec =	$_POST['nomec'];
	$email =	$_POST['email'];
	$celular =	$_POST['celular'];
	$endereco =	$_POST['endereco'];
	$biografia =	$_POST['biografia'];
	$experiencias =	$_POST['experiencias'];
	$ingles =	$_POST['ingles'];
	$formacao =	$_POST['formacao'];
	$profissao =	$_POST['profissao'];
	
	$_SESSION['NmCandidato'] = $nomec;
	$_SESSION['NmUsuario'] = $nomeu;
	$_SESSION['Email'] =	$email;
	$_SESSION['Senha'] = $senha;
	
	$query = mysql_query("UPDATE TbCandidatos SET NmUsuario = '$nomeu' ,Senha =  '$senha', NmCandidato = '$nomec', Email = '$email' , cel = '$celular',ende= '$endereco' , biografia = '$biografia', xp = '$experiencias' , ingles = '$ingles' , formacao = '$formacao', profissao = '$profissao' where IdCandidato = '$idcandidato'");
	
	echo"dados alterados";
	header('Location: editarCandidato.php');
	}
	else{
		echo"Prrecha todos os campos";
	}
	
}
else{
	echo"nao cliquei";
}
?>