<?php include_once("../lib/dbconnect.php"); ?>
<?php 
session_start();
?>
<?php
$idcandidato =  $_SESSION['IdCandidato'];
$email = $_SESSION['Email'];
$senha = $_SESSION['Senha'];
$NmC = $_SESSION['NmCandidato'];
$NmU = $_SESSION['NmUsuario'];

$sql = mysql_query("select * from TbCandidatos  where Email = '$email' and Senha = '$senha';")or die(mysql_error()); 
while($rowss = mysql_fetch_array($sql)){
	$cel = $rowss['cel'];
	$end = $rowss['ende'];
	$bio = $rowss['biografia'];
	$xp = $rowss['xp'];
	$ingles = $rowss['ingles'];
	$formacao = $rowss['formacao'];
	$profissao = $rowss['profissao'];
}
?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>NeoService</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/custom-themes.css">
    <link rel="shortcut icon" type="image/png" href="../assets/img/favicon.png" />
	<link rel="stylesheet" href="../assets/css/styleCandidato.css">
</head>

<body>
    <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">PERFIL</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="../images/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php echo"$NmC"?>
                        </span>
                        <span class="user-role">Candidato</span>
                    </div>
                </div>
                <!-- sidebar-header  -->
               <div class="sidebar-search">
                    <div>
                        <div class="input-group">
						
						
						<form method="post">
                            <input type="text" name="pesquisa" class="form-control search-menu" list="historico" placeholder="Pesquise..."/>
							
							 <div class="input-group-append">
                                <span class="input-group-text">
								<input value="" class="fa fa-search" aria-hidden="true"type="submit"/>
                                    <i type="input"class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
							<input type="hidden" name="env" value="pesquisar"/>
							
							<datalist id="historico">
							<?php
							$sqli = mysql_query("select * from TbEmpresas;");
							while($row = mysql_fetch_array($sqli)){
							$Usuario = $row['NmEmpresa'];
							echo"<option value='$Usuario'></option>";
							}
							?>
							</datalist>
                           
							</form>
							<?php
							if(isset($_POST['env']) && $_POST['env'] == "pesquisar"){
							$_SESSION['pesquisa'] = $_POST['pesquisa'];
								header('Location: buscaEmpresa.php');
									}
									else{
										
											}

							?>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Painel Geral</span>
                        </li>
                        <li class="sidebar">
                            <a href="telaInicialCandidato.php">
                                <i class="fa fa-globe"></i>
                                <span>Início</span>
                            </a>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Perfil</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="perfilCandidato.php">Resumo

                                        </a>
                                    </li>
                                    <li>
                                        <a href="editarPerfilCandidato.php">Editar Perfil</a>
                                    </li>
									
									<li>
                                        <a href="CompetenciasCadastrarExcluir.php">Competências</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar">
                            <a href="#">
                                <i class="far fa-gem"></i>
                                <span>Não definido</span>
                            </a>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div class="dropdown">

                    <a href="#" class="" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-warning notification">3</span>
                    </a>
                    <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                        <div class="notifications-header">
                            <i class="fa fa-bell"></i>
                            Notifications
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-check text-success border border-success"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                                    <div class="notification-time">
                                        6 minutes ago
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-exclamation text-info border border-info"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                                    <div class="notification-time">
                                        Today
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-exclamation-triangle text-warning border border-warning"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                                    <div class="notification-time">
                                        Yesterday
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="#">View all notifications</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="chatCandidato.php"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                        <a class="dropdown-item" href="#">Ajuda</a>
                    </div>
                </div>
                <div>
                    <a href="logoutCandidato.php">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </div>
			
			
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="../images/user.jpg" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Alterar
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
									
                                      <?php echo"$NmC"?>
                                    </h5>
                                    <h6>
                                      <?php echo"$profissao"?>
                                    </h6>
                                    <p class="proile-rating">ESTRELAS : <span>0/5</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Competências</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <div class="profile-work">
                            <p>COMPETÊNCIAS</p><br/>
							
                            
                            <?php
							$if = mysql_query("select a.NmCandidato,
							b.Competencia
							
							from TbCandidatos a
							inner join tbcompetenciaRelacao c
							on a.IdCandidato = c.fk_IdCandidato
							inner join tbcompetencias b
							on b.IdCompetencia = c.fk_IdCompetencia
							where IdCandidato = $idcandidato;")or die (mysql_error());
							
							while($ifrow = mysql_fetch_array($if)){
							$comp = $ifrow['Competencia'];
                            echo"<p>$comp<p><br/>";
							}
							?>
							
						
                        
							
							
                        </div>
                    </div>

                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            	<form>
								</form>
								
								<form action="CompetenciasCadastrar.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cadastar Competências</label><br/><br/>
                                            </div>
                                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                            </div>
                                        </div>
                                </form>

                                <form action="CompetenciasExcluir.php">
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Excluir Competências</label>
                                            </div>
                                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Excluir</button>
                                            </div>
                                        </div>
                              	</form>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>
                </div>
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>