<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <!-- Favicon do site 
    <link rel="shortcut icon" href="#" type="image/png"> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeoService</title>
    <meta name="description" content="Sua plataforma para serviços temporários!">
    <meta name="author" content="NeoService Authors.">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.css">

    <!-- Slider
        ================================================== -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="assets/css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
        ================================================== -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="assets/css/styleLoginEmpresa.css">
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/responsive.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    <link href="assets/css/material-fullpalette.min.css" rel="stylesheet">
    <link href="assets/css/material.min.css" rel="stylesheet">
  </head>
  <body>
<!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container"> 
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="index.html"><img src="" alt="NeoService logo"><strong></strong></a> </div>
          
          <!-- Links de navegação do site -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.html" class="page-scroll"><i class="fa fa-home"></i>  Início</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-sign-in"></i>  Login<i class="fa fa-angle-down"></i></a>
          <ul class="dropdown-menu">
          <li><a href="login-empresa.html"><i class="fa fa-building"></i>      Empresa</a></li>
          <li><a href="login-usuario.html"><i class="fa fa-user"></i>       Usuário</a></li>
          </ul>
          <li><a href="contato.html" class="page-scroll"><i class="fa fa-envelope-o"></i>  Contato</a></li>
          <li class="dropdown">
            </ul>
          </div>
          <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid --> 
      </nav>

<!-- Header -->
<header class="text-left" name="home">
  <div class="intro-text">
    <!-- Tela login -->
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100">
          <form name="loginform" method="POST" action = "empresaAutenticacao.php" class="login100-form validate-form">
            <span class="login100-form-logo">
              <i class="zmdi zmdi-landscape"></i>
            </span>
            <span class="login100-form-title p-b-34 p-t-27">
              Login
            </span>
            <div class="wrap-input100 validate-input" data-validate = "Enter email">
              <input class="input100" type="text" name="Temail" placeholder="Email">
              <span class="focus-input100" data-placeholder="&#xF002;"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <input class="input100" type="password" name="Tsenha" placeholder="Senha">
              <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>
            <div class="container-login100-form-btn">
              <button class="login100-form-btn">
                Login
              </button>
            </div>
            <div class="text-center">
              <a class="txt1" href="cadastroDeEmpresa.php">
                <p></p>
                Não tem uma conta? Crie uma!
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>

</header>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.1.11.1.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type="text/javascript" src="assets/js/bootstrap.js"></script> 
<script type="text/javascript" src="assets/js/SmoothScroll.js"></script> 
<script type="text/javascript" src="assets/js/wow.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.isotope.js"></script> 
<script type="text/javascript" src="assets/js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="assets/js/contact_me.js"></script> 
<script type="text/javascript" src="assets/js/owl.carousel.js"></script> 

<!-- Javascripts
    ================================================== --> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>