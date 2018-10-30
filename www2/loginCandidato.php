<?php include_once("lib/dbconnect.php"); ?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>NeoService - Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    	<link rel="icon" type="image/x-icon" href="../images/favicon.ico">
		<link rel="stylesheet" type="text/css"  href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/main-login.css" />
		<link rel="stylesheet" href="assets/css/login.css" />
		<link rel="stylesheet" href="../assets/css/teste.css"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<!-- Slider  -->
		<link href="assets/css/owl.carousel.css" rel="stylesheet" media="screen">
		<link href="assets/css/owl.theme.css" rel="stylesheet" media="screen">
	</head>
	<body class="is-preload">
	<canvas id="space"></canvas>
		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
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
								<li><a href="../index.php">INÍCIO</a></li>
								<li><a href="loginEmpresa.php">ENTRAR COMO EMPRESA</a></li>
							</ul>
							<a href="#" class="close">FECHAR</a>
						</div>
					</nav>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form name="loginform" method="POST" action = "" class="login100-form validate-form">
					<span class="login100-form-logo-1 animated bounce">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27 animated infinite pulse">
						Candidato
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100 animated flash delay-2s" type="text" name="Temail" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf02b;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 animated flash delay-5s" type="password" name="Tsenha" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
						<input type="hidden" name="env" value="login"/>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="Cadastro De Candidato/cadastroCandidato.php">
						<p></p>
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
				
				
				header('Location: telaInicialCandidato.php');
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
		
	}
	
	?>
			</div>
		</div>
	</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="../assets/js/constelacoes.js"></script>
			<script type="text/javascript" src="assets/js/owl.carousel.js"></script> 
			<script type="text/javascript" src="assets/js/wow.min.js"></script> 
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>