<?php include_once("lib/dbconnect.php"); ?>

<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<title>Cadastro de empresa</title>
<link rel="stylesheet" type="text/css" href="EstiloMenu.css"/>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
</head>
<body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>



	

<form method="POST" id="CadastroEmpresa" action="">
<fieldset>
<legend id="Titulo"> Cadastro de Empresa </legend>


		
  <p><label for="Cuser">Usuário: </label><input type="text" name="Tuser" id="Cuser" size="20" maxlength="30" placeholder="Nome de usuário"required/></p>
  <p><label for="Csenha">Senha: </label><input type="password" name="Tsenha" id="Csenha" size="16" maxlength="16" placeholder="********"required/></p>
  <p><label for="Cemail">E-mail: </label><input type="email" name="Temail" id="Cemail" size="20" maxlength="40" required/></p>
  <p><label for="CnomeEmp">Nome da Empresa: </label><input type="text" name="TnomeEmp" id="CnomeEmp" size="20" maxlength="30" required/></p>
   <p><label for="Ccnpj">Informe o CNPJ:</label><input type="text" id="Ccnpj" name="Tcnpj" /></p>
  <p><label for="Crazao">Razão Social: </label><input type="text" name="Trazao" id="Crazao" size="20" maxlength="30" placeholder="Empresa Ltda" required/></p>
  <p><label for="Ccep">CEP: </label><input name="Tcep" id="Ccep" type="text" required/></p>
  <p><label for="uf">Estado :</label>
		<select name="Testado"id="uf" required>
			<option value="Acre">Acre</option>
			<option value="Alagoas">Alagoas</option>
			<option value="Amapá">Amapá</option>
			<option value="Amazonas">Amazonas</option>
			<option value="Bahia">Bahia</option>
			<option value="Ceará">Ceará</option>
			<option value="Distrito Federal">Distrito Federal</option>
			<option value="Espírito Santo">Espírito Santo</option>
			<option value="Goiás">Goiás</option>
			<option value="Maranhão">Maranhão</option>
			<option value="Mato Grosso">Mato Grosso</option>
			<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
			<option value="Minas Gerais">Minas Gerais</option>
			<option value="Pará">Pará</option>
			<option value="Paraíba">Paraíba</option>
			<option value="Paraná">Paraná</option>
			<option value="Pernambuco">Pernambuco</option>
			<option value="Piauí">Piauí</option>
			<option value="Rio de Janeiro">Rio de Janeiro</option>
			<option value="Rio Grande do Norte">Rio Grande do Norte</option>
			<option value="Rio Grande do Sul">Rio Grande do Sul</option>
			<option value="Rondônia">Rondônia</option>
			<option value="Roraima">Roraima</option>
			<option value="Santa Catarina">Santa Catarina</option>
			<option value="São Paulo">São Paulo</option>
			<option value="Sergipe">Sergipe</option>
			<option value="Tocantins">Tocantins</option>
		</select>
		
		<p><label for="Ccidade"> Cidade:</label><input name="Tcidade" id="Ccidade" type="text" size="20" maxlength="30" required/></p>
		<p><label for="Cbairro">Bairro: </label><input name="Tbairro" id="Cbairro" type="text" size="20" maxlength="30" required/></p>
		<p><label for="Cendereco">Endereço: </label><input name= "Tendereco" id="Cendereco" type="text" size="50" maxlength="30" required/></p>
		 <p><label for="Cnumero">Número: </label><input name="Tnumero" id="Cnumero" type="text" size="2" maxlength="30" />
		<label for="Ccomplemento">Complemento: </label><input name="Tcomplemento" id="Ccomplemento" type="text" size="2" maxlength="30"/></p>
		
		<input id="CBotaoCadastrar" type="submit" value="Cadastrar" >
		<input type="hidden" name="env" value="cad">
        <input id="CBotaoLimpar" type="reset" value="Limpar"/>
        </fieldset>
</form>


<script type="text/javascript">
		$("#Ccep").focusout(function(){
			
			$.ajax({
				
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				
				dataType: 'json',
				
				success: function(resposta){
					
					$("#Cendereco").val(resposta.logradouro);
					$("#Ccomplemento").val(resposta.complemento);
					$("#Cbairro").val(resposta.bairro);
					$("#Ccidade").val(resposta.localidade);
					$("#uf").val(resposta.uf);
					
					$("#Cnumero").focus();
				}
			});
		});
	</script>

    

</body>
</html>


<?php
	if($_POST['env'] && $_POST['env'] == "cad"){
		if($_POST['Tuser'] || $_POST['Tsenha'] || $_POST['Temail'] || $_POST['TnomeEmp'] || $_POST['Tcnpj'] || $_POST['Trazao'] || $_POST['Tcep'] || $_POST['Testado'] || $_POST['Tcidade'] || $_POST['Tbairro'] || $_POST['Tendereco'] || $_POST['Tnumero'] || $_POST['Tcomplemento']  ){
			$Tuser = $_POST['Tuser'];
			$Tsenha = $_POST['Tsenha'];
			$Temail = $_POST['Temail'];
			$TnomeEmp = $_POST['TnomeEmp'];
			$Tcnpj = $_POST['Tcnpj'];
			$Trazao = $_POST['Trazao'];
			$Tcep = $_POST['Tcep'];
			$Testado = $_POST['Testado'];
			$Tcidade = $_POST['Tcidade'];
			$Tbairro = $_POST['Tbairro'];
			$Tendereco = $_POST['Tendereco'];
			$Tnumero = $_POST['Tnumero'];
			$Tcomplemento = $_POST['Tcomplemento'];
			
			
			if ($con){
	$sqli = mysql_query("select * from TbEmpresas where NmUsuario = '$Tuser'");
	$sqlii = mysql_query("select * from TbEmpresas where Email = '$Temail'");
	$sqliii = mysql_query("select * from TbEmpresas where CNPJ = '$Tcnpj'");
	if(mysql_num_rows($sqli)>=1){
		
	echo "<div class='alert alert-danger'>Esse nome de usuário já está sendo utilizado!</div>";
		
		
	}
	
	
	
	elseif(mysql_num_rows($sqlii)>=1){
		
	echo "<div class='alert alert-danger'>Esse E-mail já está sendo utilizado!</div>";
	}
	
	
		
	elseif(mysql_num_rows($sqliii)>=1){
		
		
	echo "<div class='alert alert-danger'>Esse CNPJ já está sendo utilizado!</div>";
	}
	
	
	
	
	

	else{
		
	
	
		$sql = @mysql_query("insert into TbEmpresas(NmUsuario,Senha,Email,NmEmpresa,CNPJ,Razao,CEP,Estado,Cidade,Bairro,Endereco,Numero,Complemento)
		values('$Tuser','$Tsenha','$Temail','$TnomeEmp','$Tcnpj','$Trazao',$Tcep,'$Testado','$Tcidade','$Tbairro','$Tendereco',$Tnumero,'$Tcomplemento')") or die (mysql_error());
 
	
	echo"Você cadastrado com sucesso, aguarde um instante.";
	
 
	}
}
else{
echo "Naooo";
}

		}
		
		else{
			echo"<div class='alert alert-danger'>Preencha Todos os Campos</div>";
		}
	}
?>