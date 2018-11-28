<?php include_once("../assets/lib/dbconnect.php"); ?>

<?php 
session_start();


 if($_SESSION['Contador'] == 2){
	echo "aeeeee";
	header('Location: CompetenciasCadastrar.php');
	
	$_SESSION['Contador'] = 0; 
}
$_SESSION['Contador'] +=1;
?>
<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>NeoService - Competências</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/custom-themes.css">
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
                <div class="row">
                    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                           <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo"$img"?>" alt="User picture">
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
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cadastrar Competências</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>COMPETÊNCIAS</p>
                            <?php
							$if = "select a.NmCandidato,
							b.Competencia
							
							from TbCandidatos a
							inner join tbcompetenciaRelacao c
							on a.IdCandidato = c.fk_IdCandidato
							inner join tbcompetencias b
							on b.IdCompetencia = c.fk_IdCompetencia
							where IdCandidato = $idcandidato;";
							
							$if2 = mysqli_query($conn, $if);
							
							while($ifrow = mysqli_fetch_array($if2)){
							$comp = utf8_encode($ifrow['Competencia']);
                            echo"$comp<br/>";
							}
							?>
							
						
                        </div>
                    </div>
                   

                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<form>
							</form>
                            	<form  method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Escolha sua Competência
												
												<select name='select'>
														<?php
							$query ="select * from TbCompetencias;";
							$query2 = mysqli_query($conn,$query);
							while($rowsss = mysqli_fetch_array($query2)){
								$competencia = $rowsss['competencia'];
								
                            echo"
							<option>$competencia</option>
							
							";
							}
                            ?>
							</select></label><br/>
                                            </div>
                                        </div>
                                        
                                         

<br/>
<br/>
                                
                   		
                                         <div class="row">
                                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Cadastrar"/>
								<input type="hidden" name="cadcomp" value="cads"/>
                                            </div>
                                        </div>
                              	</form>
								<?php
								if(isset($_POST['cadcomp']) && $_POST['cadcomp']=="cads"){
									$competencia = $_POST['select'];
									
									
									
									
									
									$sqli = "select * from TbCompetencias where competencia = '$competencia'";
									$sqli2 = mysqli_query($conn,$sqli);
			
									while($rowssa = mysqli_fetch_array($sqli2)){
									
									$idcompetencia = $rowssa['IdCompetencia'];
									
									
								
									}
	
									$sqli = "select * from tbcompetenciaRelacao where fk_IdCompetencia = '$idcompetencia' and fk_IdCandidato='$idcandidato'";
									
									$sqli2 = mysqli_query($conn,$sqli);
	
									if(mysqli_num_rows($sqli2)>=1){
		
									echo "<div class='alert alert-danger'>Essa competência já foi cadastrada!</div>";
		
		
									}
									else{
	
									if(mysqli_query($conn,"insert into tbcompetenciaRelacao(fk_IdCandidato,fk_IdCompetencia)
										values('$idcandidato ','$idcompetencia');")){
											
										
									}

									else{
		
	
	
									
	
										echo"Erro ao cadastrar!";
	
 
									}
								}
								header('Location: CompetenciasCadastrar.php');
								}
								else{
									echo"aa";
									
								}
								?>
                            
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