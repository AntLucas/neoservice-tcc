<?php include_once("lib/dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Cadastro
					</span>
				</div>

				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="nmu" placeholder="Nome de usuário">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Senha</span>
						<input class="input100" type="password" name="senha" placeholder="****">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Repetir Senha</span>
						<input class="input100" type="password" name="senha2" placeholder="****">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Nome do candidato</span>
						<input class="input100" type="text" name="nmc" placeholder="Nome do candidato">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" >
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email@Email">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Celular</span>
						<input class="input100" type="text" name="cel" placeholder="(11)91111-1111">
						<span class="focus-input100"></span>
					</div>

				
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Endereço</span>
						<input class="input100" type="text" name="end" placeholder="Rua tal, Bairro tal ,SP-São Paulo">
						<span class="focus-input100"></span>
					</div>

			
					
				

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Cadastrar
						</button>
						
						
						<input type="hidden" name="env" value="cad">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


<?php
	if($_POST['env'] && $_POST['env'] == "cad"){
		if($_POST['nmu'] || $_POST['senha'] || $_POST['senha2'] || $_POST['nmc'] || $_POST['email'] || $_POST['cel'] || $_POST['end'] ){
			$nmu = $_POST['nmu'];
			$senha = $_POST['senha'];
			$senha2 = $_POST['senha2'];
			$nmc = $_POST['nmc'];
			$email = $_POST['email'];
			$cel = $_POST['cel'];
			$end = $_POST['end'];
			
			
			if($senha == $senha2){
			if ($con){
	$sqli = mysql_query("select * from TbCandidatos where NmUsuario = '$nmu'");
	$sqlii = mysql_query("select * from TbCandidatos where Email = '$email'");

	if(mysql_num_rows($sqli)>=1){
		
	echo "<div class='alert alert-danger'>Esse nome de usuário já está sendo utilizado!</div>";
		
		
	}
	
	
	
	elseif(mysql_num_rows($sqlii)>=1){
		
	echo "<div class='alert alert-danger'>Esse E-mail já está sendo utilizado!</div>";
	}
	
	
	
	

	else{
			
			
	
	
		$sql = @mysql_query("insert into TbCandidatos(NmUsuario,Senha,NmCandidato,Email,cel,ende,biografia,xp,ingles,formacao,profissao)
		values('$nmu','$senha','$nmc','$email','$cel','$end','Edite esse campo','Edite esse campo','Edite esse campo','Edite esse campo','Edite esse campo');") or die (mysql_error());
 
	
	echo"Você foi cadastrado com sucesso, aguarde um instante.";
	
 
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