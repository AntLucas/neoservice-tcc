<?php include_once("../assets/lib/dbconnect.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>NeoService - Cadastro</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/cadastro.css">
<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    function FormataCnpj(campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(campo.value);
				vr = vr.replace(".", "");
				vr = vr.replace("/", "");
				vr = vr.replace("-", "");
				tam = vr.length + 1;
				if (tecla != 14)
				{
					if (tam == 3)
						campo.value = vr.substr(0, 2) + '.';
					if (tam == 6)
						campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 5) + '.';
					if (tam == 10)
						campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/';
					if (tam == 15)
						campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/' + vr.substr(9, 4) + '-' + vr.substr(13, 2);
				}
			}



function validarCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

	function validarSenha(){
		var senha = formCadastro.senha.value;
		var senha2 = formCadastro.senha2.value;
		
		if (senha != senha2){
		alert('Senhas diferentes.')
		return false;
		}
	}
	
	window.onload = function() {
    var recaptcha = document.forms["formCadastro"]["g-recaptcha-response"];
    recaptcha.required = true;
    recaptcha.oninvalid = function(e) {
    alert("Você é um robô? Se não, por favor complete o captcha.");
      }
   }
	
	</script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body class="galaxy">
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://cdn0.iconfinder.com/data/icons/flat-design-galaxy/1701/Saturn3-512.png" alt=""/>
                        <h3>Bem-vindo!</h3>
                        <p>Você está perto de divulgar sua vaga!</p>
                        <a href="loginEmpresa.php"><input type="button" name="" value="Login"/></a>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="empresa" role="tabpanel" aria-labelledby="candidato-tab">
                                <h3 class="register-heading">Cadastre-se como empresa</h3>
								<form>
								</form>
								<form name="formCadastro" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">
										<div class="form-group">
                                            <input type="text" name="nmUsu" required="required" maxlength="30" class="form-control" placeholder="Nome de Usuário *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nmEmpresa" required="required" maxlength="30" class="form-control" placeholder="Nome da Empresa *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="razaoSocial" required="required" maxlength="50" class="form-control" placeholder="Razão Social *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="longtext" name="cnpj" required="required" name="cnpj" id="cnpj" onkeyup="FormataCnpj(this,event)" onblur="if(!validarCNPJ(this.value)){alert('CNPJ Informado é inválido'); this.value='';}" maxlength="18" placeholder="CNPJ *" class="form-control input-md" ng-model="cadastro.cnpj" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" required="required" maxlength="45" class="form-control"  placeholder="E-mail *" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                                        </div>
										<div class="form-group">
                                            <input type="password" required="required" maxlength="16" name="senha" class="form-control" placeholder="Senha *" value="" />
                                        </div>
										<div class="form-group">
                                            <input type="password" required="required" maxlength="16" name="senha2" class="form-control" placeholder="Confirme sua senha *" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
									<form method="get" action=".">
										<input name="cep" type="text" id="cep" value="" size="10" maxlength="9" required="required" class="form-control" placeholder="CEP *"
											   onblur="pesquisacep(this.value);" /><p/><p>
										<input name="rua" type="text" id="rua" readonly="true" size="60" class="form-control" placeholder="Rua *"/><p />
										<input name="bairro" type="text" id="bairro" readonly="true" size="40" class="form-control" placeholder="Bairro *" /><p />
										<input name="cidade" type="text" id="cidade" readonly="true" size="40" class="form-control" placeholder="Cidade *" /><p />
										<input name="uf" type="text" id="uf" readonly="true" size="2" class="form-control" placeholder="Estado *" /><p />
									 </form>
									 <div class="form-group">
                                            <input type="text" name="numero" class="form-control"  placeholder="Número *" value="" />
                                        </div>
									<div class="g-recaptcha" data-sitekey="6LdjfHgUAAAAABMPodoRp08r_wMK5Q39SgWFdgQ8"></div>
									<input type="submit" name="env" class="btnRegister" value="Registrar" onclick="return validarSenha()"/>
                                    </div>
                                </div>
								</form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
			</div>
			
			<script src="../assets/js/ceuEstrelado.js"></script>
			<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>

<?php
	if(isset($_POST['env']) && $_POST['env'] == "Registrar"){
		if($_POST['nmUsu'] || $_POST['nmEmpresa'] || $_POST['razaoSocial'] || $_POST['cnpj'] || $_POST['email'] || $_POST['senha'] || $_POST['senha2'] || $_POST['cep'] || $_POST['rua'] || $_POST['bairro'] || $_POST['cidade'] || $_POST['estado'] || $_POST['numero']){
			$nmUsu = $_POST['nmUsu'];
			$nmEmpresa = $_POST['nmEmpresa'];
			$razaoSocial = $_POST['razaoSocial'];
			$cnpj = $_POST['cnpj'];
			$email= $_POST['email'];
			$senha = $_POST['senha'];
			$senha2 = $_POST['senha2'];
			$cep = $_POST['cep'];
			$rua = $_POST['rua'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['uf'];
			$numero = $_POST['numero'];
			
		
			if($senha == $senha2){
			if ($conn){
	$sqli = mysqli_query($conn,"select * from TbEmpresas where NmUsuario = '$nmUsu'");
	$sqlii = mysqli_query($conn,"select * from TbEmpresas where Email = '$email'");
	$sqliii = mysqli_query($conn,"select * from TbEmpresas where CNPJ = '$cnpj'");

	if(mysqli_num_rows($sqli)>0){
	
	echo "<div class='alert alert-danger'>Esse nome de usuário já está sendo utilizado!</div>";
		
	
	}
	
	
	
	elseif(mysqli_num_rows($sqlii)>0){
		
	echo "<div class='alert alert-danger'>Esse E-mail já está sendo utilizado!</div>";

	}
	
	elseif(mysqli_num_rows($sqliii)>0){
	
	echo "<div class='alert alert-danger'>Esse CNPJ já está sendo utilizado!</div>";
	}
	
	
	
	

	else{
			
			
	$sql = mysqli_query($conn,"insert into TbEmpresas(NmUsuario,NmEmpresa,Razao,CNPJ,Email,Senha,CEP,Endereco,Bairro,Cidade,Estado,Numero,biografia,foto)
		values('$nmUsu','$nmEmpresa','$razaoSocial','$cnpj','$email','$senha',$cep,'$rua','$bairro','$cidade','$estado',$numero,'Edite esse campo','user.jpg');") or die (mysqli_error());
	
		$nmUsu = $_POST['nmUsu'];
			$nmEmpresa = $_POST['nmEmpresa'];
			$razaoSocial = $_POST['razaoSocial'];
			$cnpj = $_POST['cnpj'];
			$email= $_POST['email'];
			$senha = $_POST['senha'];
			$senha2 = $_POST['senha2'];
			$cep = $_POST['cep'];
			$rua = $_POST['rua'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['uf'];
			$numero = $_POST['numero'];
	echo"<div class='alert alert-success'>Você foi cadastrado com sucesso, aguarde um instante.</div>";
	
 
	}
}
else{

}
		}
		else{
			
			echo"<div class='alert alert-danger'>As Senhas devem ser iguais!</div>";
		}
		}
		
		else{
			echo"<div class='alert alert-danger'>Preencha Todos os Campos</div>";
		}
		
			
	}
?>