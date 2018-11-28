<?php include_once("../assets/lib/dbconnect.php"); ?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>NeoService - Cadastro</title>
<meta charset="UTF-8" />
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
                        <img src="https://cdn0.iconfinder.com/data/icons/flat-design-galaxy/1701/Saturn1-512.png" alt=""/>
                        <h3>Bem-vindo!</h3>
                        <p>Você está perto de conseguir um trabalho temporário!</p>
                        <a href="loginCandidato.php"><input type="button" name="" value="Login"/></a>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="candidato" role="tabpanel" aria-labelledby="candidato-tab">
                                <h3 class="register-heading">Cadastre-se como candidato</h3>
								<form>
								</form>
								<form name="formCadastro" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">
									 <div class="form-group">
                                            <input type="text" required="required" name="nmUsu" maxlength="15" class="form-control" placeholder="Nome de Usuário *" value="" />
											
                                        </div>
                                        <div class="form-group">
                                            <input type="text" style="text-transform: capitalize;" required="required" name="nmEsb" maxlength="30" class="form-control texto" placeholder="Nome e Sobrenome *" value="" pattern="^[a-zA-Z\u00C0-\u017F´]+\s+[a-zA-Z\u00C0-\u017F´]{0,}$" />
											
                                        </div>
										<div class="form-group">
                                            <input type="email" required="required" name="email" maxlength="45" class="form-control"  placeholder="E-mail *" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required="required" name="senha" maxlength="16" class="form-control" placeholder="Senha *" />
							
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required="required" name="senha2" maxlength="16" class="form-control" placeholder="Confirme sua senha *"  />
                                        </div>
										<div class="form-group">
                                            <input type="date" required="required" name="bday" min="01-01-1910" class="form-control" placeholder="Data de Nascimento *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Homem </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span> Mulher </span> 
                                                </label>
                                            </div>
                                        </div>
										
                                    </div>
                                    <div class="col-md-6">
									<form method="get" action=".">
										<input name="cep" type="text" id="cep" value="" required="required" size="10" maxlength="9" class="form-control" placeholder="CEP *"
											   onblur="pesquisacep(this.value);" /><p/><p>
										<input name="rua" type="text" id="rua" readonly="true" size="60" class="form-control" placeholder="Rua *"/><p />
										<input name="bairro" type="text" id="bairro" readonly="true" size="40" class="form-control" placeholder="Bairro *" /><p />
										<input name="cidade" type="text" id="cidade" readonly="true" size="40" class="form-control" placeholder="Cidade *" /><p />
										<input name="uf" type="text" id="uf" readonly="true" size="2" class="form-control" placeholder="Estado *" /><p />
									 </form>
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
	if($_POST['env'] && $_POST['env'] == "Registrar"){
		if($_POST['nmUsu'] || $_POST['nmEsb'] || $_POST['email'] || $_POST['senha'] || $_POST['senha2'] || $_POST['bday'] || $_POST['cep'] || $_POST['rua'] || $_POST['bairro'] || $_POST['cidade'] || $_POST['estado']){
			$nmUsu = $_POST['nmUsu'];
			$nmEsb = $_POST['nmEsb'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$senha2 = $_POST['senha2'];
			$bday = $_POST['bday'];
			$cep = $_POST['cep'];
			$rua = $_POST['rua'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['uf'];
			
			
		
			if($senha == $senha2){
			if ($conn){
	$sqli = mysqli_query($conn,"select * from TbCandidatos where NmUsuario = '$nmUsu'");
	$sqlii = mysqli_query($conn,"select * from TbCandidatos where Email = '$email'");

	if(mysqli_num_rows($sqli)>=1){
		
	echo "<div class='alert alert-danger'>Esse nome de usuário já está sendo utilizado!</div>";
		
		
	}
	
	
	
	elseif(mysqli_num_rows($sqlii)>=1){
		
	echo "<div class='alert alert-danger'>Esse E-mail já está sendo utilizado!</div>";
	}
	
	
	
	

	else{
			
			
	
	
		$sql = @mysqli_query($conn,"insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email,bdat,cep,estado,cidade,bairro,rua,biografia,xp,ingles,formacao,profissao,foto)
		values('$nmUsu','$senha','$nmEsb','$email','$bday','$cep','$estado','$cidade','$bairro','$rua','Edite esse campo','Edite esse campo','Edite esse campo','Edite esse campo','Sem Profissão','user.jpg');") or die (mysqli_error());
 
	echo"
	<script>
	alert('aeee');
	</script>
	";
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