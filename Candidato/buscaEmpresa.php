<?php include_once("../assets/lib/dbconnect.php"); ?>
<?php 
session_start();
?>
	<?php
						if(isset($_POST['perfil']) && $_POST['perfil']=="perfils"){
						$idemp = $_POST['idd'];
						$_SESSION['idbusca'] = $idemp;
						echo"".$_SESSION['idbusca'];
				header('Location: perfilDeEmpresa.php'); 	
						}

?>

<?php
$pesquisa = $_SESSION['pesquisa'];
$idcandidato =  utf8_encode($_SESSION['IdCandidato']);
$email = utf8_encode($_SESSION['Email']);
$senha = utf8_encode($_SESSION['Senha']);
$NmC = utf8_encode($_SESSION['NmCandidato']);
$nomeu = utf8_encode($_SESSION['NmUsuario']);
$senha	= utf8_encode($_SESSION['Senha']);
$cep	= utf8_encode($_SESSION['cep'] );
$estado	= utf8_encode($_SESSION['estado']); 
$cidade	= utf8_encode( $_SESSION['cidade']) ;
$bairro	= utf8_encode($_SESSION['bairro'] );
$rua	= utf8_encode($_SESSION['rua'] );
$bio	= utf8_encode($_SESSION['biografia']);
$xp	= utf8_encode($_SESSION['xp'] );
$ingles	= utf8_encode($_SESSION['ingles']); 
$formacao	= utf8_encode($_SESSION['formacao']);
$profissao	= utf8_encode($_SESSION['profissao']); 

$sql = "select * from TbCandidatos  where Email = '$email' and Senha = '$senha';";
$sql2 = mysqli_query($conn, $sql);
while($rowss = mysqli_fetch_array($sql2)){

	$bday = utf8_encode($rowss['bdat']);
	$nascimento = implode("/", array_reverse(explode("-", $bday)));
	
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
						$imagem = mysqli_query($conn,"select foto from tbcandidatos where idcandidato = $idcandidato");
						while($assoc = mysqli_fetch_assoc($imagem)){
							$img = utf8_encode($assoc['foto']);
						}
						?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>NeoService - Busca</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/custom-themes.css">
	<link rel="stylesheet" href="../assets/css/buscaCandidato.css">
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
                        <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo"$img"?>" alt="User picture">
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
                    <form method="post" action="pesquisa.php">
                        <div class="input-group">
						
                            <input type="text" name="pesquisa" class="form-control search-menu" list="historico" placeholder="Pesquise..."/>
					
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <button type="hidden" class="fa fa-search" aria-hidden="true" style="background:transparent;border:none;color:gray;"></button>
                                </span>
                            </div>
							<input type="hidden" name="env" value="pesquisar"/>
							
							<datalist id="historico">
							<?php
							$sqli = "select * from TbEmpresas;";
							$sqli2 = mysqli_query($conn, $sqli);
							while($row = mysqli_fetch_array($sqli2)){
							$Usuario = $row['NmUsuario'];
							echo"<option value='$Usuario'></option>";
							}
							?>
							</datalist>
                           
							</form>
							
							
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
                            <a href="TelaInicialCandidato.php">
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
                        <a class="dropdown-item" href="excluirCandidato.php"><strong>EXCLUIR CONTA</strong></a>
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
					<div class="container"><br>
				<div class="jumbotron p-3 text-center">
				  <h1 class="display-4">Busca de Empresas</h1><hr>
				  <p class="lead">Resultados pela busca: "<?php echo"$pesquisa";?>"</p>
				  <p class="lead">
				  </p>
				</div>
				
				
				
				
		
				<div class="row">	
			<?php 
		$sqlpesquisa = "select * from TbEmpresas where NmEmpresa = '$pesquisa'";
		$sqlpesquisa2 = mysqli_query($conn,$sqlpesquisa);
		
		while($lc = @mysqli_fetch_array($sqlpesquisa2) ){
		$nmempresa = $lc['NmEmpresa'];
		$idempresa = $lc['IdEmpresa'];
		$img2 = utf8_encode($lc['foto']);
		?>				
		
				  <div class="col-sm-6">
					<div class="card">
					  <h4 class="card-header text-right bg-dark text-white"><?php echo"$nmempresa";?>
					  <div class="float-left small">
					  <form method="post" >
						<input type="submit" class="btn btn-raised btn-danger" title="Ver perfil de EMPRESA" value="Perfil"/>
						<input type="hidden" name="perfil" value="perfils"/>
						<input type="hidden" name="idd" value="<?php echo"$idempresa"?>">
						</form>
					
							
						 
						  
					  </div>
					  </h4>
					  <div class="card-body">
						  <div class="image float-right user-r">
							<img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo"$img2"?>" alt="User picture">
						  </div>
						  <br>
						<h4 class="card-title">Vagas</h4>
						

                           
                             <div class="col-md-6">
								<?php
							$if = "select * from tbvagas where fk_IdEmpresa = '$idempresa';";
							$if2 = mysqli_query($conn,$if);
							while($ifrow = mysqli_fetch_array($if2)){
							$vag = utf8_encode($ifrow['vaga']);
							$sal = utf8_encode($ifrow['salario']);
							$desc = utf8_encode($ifrow['descricao']);
							$horario = utf8_encode($ifrow['horario']);
                           
							
                            
                    ?>
						  <p class="card-text"><center><strong><?php echo"$vag";?></strong></center></p>
						  <p><strong>Remuneração: </strong><?php echo"R$ $sal"?></p>
						  <p><strong>Horário: </strong><?php echo"$horario"?> </p>
						 <p><strong>Descrição: </strong><?php echo"$desc";?></p><?php
						  echo"</br></br></br>";
						 
					  }
							?>
						
					</div>
				  </div>

				</div>
		
				
				
				
				<br>

				</div>
				

				
				  <?php
				  
					  }
							?>
				  </hr>
					
					</div>
	
				
					<!-- jQuery first, then Bootstrap JS. -->
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
	<script src="https://unpkg.com/popper.js@1.12.5/dist/umd/popper.js"></script>
	<script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/js/bootstrap-material-design.js"></script>
</body>

</html>
