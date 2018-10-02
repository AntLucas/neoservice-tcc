<!DOCTYPE html>
<html>
<head>
<title>Cadastro de empresa</title>
<link rel="stylesheet" type="text/css" href="EstiloMenu.css"/>
<script type ="text/javascript">
		function Nova(){
			setTimeout("window.location='cadastroDeEmpresa.php'",10);
		}
		</script>
</head>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<div id="Corpo">


	<input type="checkbox" id="bt_menu">
	<label id="hamburguer" for="bt_menu" ></label>
	<span></span>

	<nav class="menu">
	<ul>
		<li><a href = "#">Inicio</a></li>
		<li><a href="#">Editar Perfil</a></li>
		<li><a href="#">Mensagens</a></li>
		<li><a href="#">Notificações</a>
			<ul>
				<li><a href="#">Curriculos recebidos</a></li>
			</ul>
		</li>
		<li><a href="#">Mais</a>
		<ul>
			<li><a href="#">Atividades realizadas</a></li>
			<li><a href="#">Sair</a></li>
		</ul>
		</li>
		
	</ul>
	</nav>

<form method="POST" id="CadastroEmpresa" action="salvarEmpresa.php">
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
		
		<input id="CBotaoCadastrar" type="submit" value="Cadastrar" onclick="Nova()" />
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