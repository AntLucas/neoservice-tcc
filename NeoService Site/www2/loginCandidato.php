<?php include_once("lib/dbconnect.php"); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Login Candidato</title>
	<meta charset="UTF-8"/>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

<link rel="stylesheet" type="text/css" href="css/main.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>


	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>







</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-05.jpg');">
			<div class="wrap-login100">
				<form name="loginform" method="POST" action = "" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="Temail" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="Tsenha" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
						<input type="hidden" name="env" value="login"/>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="cadastroDeEmpresa.php">
							Não tem uma conta? Crie uma!
						</a>
					</div>
				</form>
					<?php 
			if($_POST['env'] && $_POST['env'] == "login"){
			if($_POST['Temail'] && $_POST['Tsenha']){
			$Temail = $_POST['Temail'];
			$Tsenha = $_POST['Tsenha'];
			
			$sql= mysql_query("select * from TbCandidatos where Email = '$Temail' and Senha = '$Tsenha';")or die(mysql_error()); 
			$row = mysql_num_rows($sql);
			$linha = mysql_fetch_assoc($sql);
			
			
			
			
			if($row > 0){
				
				
				session_start();
				$_SESSION['Contador'] = 1;
				$_SESSION['IdCandidato'] = $linha['IdCandidato'];
				$_SESSION['NmCandidato'] = $linha['NmCandidato'];
				$_SESSION['NmUsuario'] = $linha['NmUsuario'];
				$_SESSION['Email'] = $linha['Email'];
				$_SESSION['Senha'] = $linha['Senha'];
				
				
				header('Location: telaInicialCandidato.php/');
				echo "<div class='alert alert-success'>Logado com sucesso!</div>";
			}
			
			else{
				echo "<div class='alert alert-danger'>Email ou senha inválidos!</div>";
			}
		}
		else{
			echo "<div class='alert alert-warning'>Preencha todos os campos</div>";
		}
	}
	else{
		echo"lixo";
	}
	
	?>
			</div>
		</div>
	</div>
	

	

	


</body>
</html>
