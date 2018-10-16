
<!DOCTYPE html>
<html>
<head>
	<title>NeoService - Login</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
	<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
</head>
<body class="is-preload">
		<header id="header" class="alt">
						<h1><a href="index.html">NEOSERVICE</a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</i></h2>
							<ul class="links">
								<li><a href="index.html">INÍCIO</a></li>
								<li><a href="#">LOGAR</a></li>
								<li><a href="#">CADASTRAR</a></li>
							</ul>
							<a href="#" class="close">Fechar</a>
						</div>
					</nav>
	<section>
		<div class="bgPulse">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</section>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form name="loginform" method="POST" action = "" class="login100-form validate-form">
					<span class="login100-form-logo-2">
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
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/jquery.scrollex.min.js"></script>
		<script src="../assets/js/browser.min.js"></script>
		<script src="../assets/js/breakpoints.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
