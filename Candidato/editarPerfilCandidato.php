<?php include_once("../assets/lib/dbconnect.php"); ?>

<?php 
session_start();
$idcandidato = $_SESSION['IdCandidato'];

 if($_SESSION['Contador'] >= 2){
	echo "aeeeee";
	header('Location: editarPerfilCandidato.php');
	
	$_SESSION['Contador'] = 0; 
}
$_SESSION['Contador'] += 1;  

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


$sql = "select * from TbCandidatos  where IdCandidato = '$idcandidato';";
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
    <title>NeoService - Editar Perfil</title>
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
					<form method="post" action="alterarCandidato.php" enctype="multipart/form-data">
                                <input type="file" name="arquivo" ></input>
								</br>
								<input class="btn btn-primary" type="submit"  value="Alterar Imagem"></input>
								</form>
					<form>
					</form>
            <form method="post" action="editarPerfilCandidato.php">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
						
                            <img src="../assets/images/fotos/<?php echo"$img"?>" alt=""/>
                            
                               
                        </div>
						
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                         <?php echo"$NmC"?>
                                    </h5>
                               
                                        <div class="col-md-6">
                                <input type="text" class="form-control" id="Cuser"name="profissao" value="<?php echo"$profissao";?>"required/>                
                                            </div>

                                    
                                    <p class="proile-rating">ESTRELAS : <span>0/5</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Linha do Tempo</a>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome de Usuário</label>
                                            </div>
                                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Cuser"name="nomeu" value="<?php echo "$nomeu";?>" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                            </div>
                                    <div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser" name="nomec" value="<?php echo "$NmC";?> "required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="email" class="form-control" id="Cuser" name="email" value="<?php echo "$email";?>"required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nova senha</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="password" class="form-control" id="Cuser" name="senha" value="<?php echo "$senha";?>" required/>
        							</div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>CEP</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser" name="cep" value="<?php echo "$cep";?>"required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Estado</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser" name="estado" value="<?php echo "$estado";?>"required/>
        							</div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Cidade</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser" name="cidade" value="<?php echo "$cidade";?>"required/>
        							</div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Bairro</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser" name="bairro" value="<?php echo "$bairro";?>"required/>
        							</div>
                                        </div>
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Rua</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser"name="rua" value="<?php echo "$rua";?>"required/>
        							</div>           
                                        </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experiência</label>
                                            </div>
                                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Cuser" name="experiencias" value="<?php echo "$xp";?>"required/>                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Inglês</label>
                                            </div>
                                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Cuser"name="ingles" value="<?php echo "$ingles";?>"required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Formação</label>
                                            </div>
                                            <div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser"  name="formacao" value="<?php echo "$formacao";?>"required/>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-12">
                                                <label>Sua biografia</label><br/>
                                                <input type="text" class="form-control" name="biografia" value="<?php echo"$bio";?>" />
                                            </div>
                                        </div>
										
                            </div>
							<input class="btn btn-primary" type="submit" value="Alterar dados"/>
					<input type="hidden" name ="env" value="altera">
					
                        </div>
                    </div>
					
                </div>
				
            </form>  


<?php
if(isset($_POST['env']) && $_POST['env'] == "altera"){
	
	
	if($_POST['nomeu'] && $_POST['senha'] && $_POST['nomec'] && $_POST['email'] && $_POST['rua'] && $_POST['biografia'] && $_POST['experiencias'] && $_POST['ingles'] && $_POST['formacao'] && $_POST['profissao'] ){
		
		
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
		

	$nomeus =	$_POST['nomeu'];
	$senhas =	$_POST['senha'];
	$nomecs =	$_POST['nomec'];
	$emails =	$_POST['email'];
	$ceps=	$_POST['cep'];
	$estados =	$_POST['estado'];
	$cidades =	$_POST['cidade'];
	$bairros =	$_POST['bairro'];
	$ruas =	$_POST['rua'];
	$biografias =	$_POST['biografia'];
	$experienciass =	$_POST['experiencias'];
	$ingless =	$_POST['ingles'];
	$formacaos =	$_POST['formacao'];
	$profissaos =	$_POST['profissao'];
	
	$_SESSION['NmCandidato'] = $nomecs;
	$_SESSION['Email'] = $emails;
	$_SESSION['NmUsuario'] = $nomeus;
	$_SESSION['Senha'] = $senhas;
	$_SESSION['cep']  = $ceps;
	$_SESSION['estado'] = $estados;
	$_SESSION['cidade'] = $cidades;
	$_SESSION['bairro']  = $bairros;
	$_SESSION['rua']  = $ruas;
	$_SESSION['biografia'] = $biografias;
	$_SESSION['xp']  = $experienciass;
	$_SESSION['ingles'] = $ingless;
	$_SESSION['formacao'] = $formacaos;
	$_SESSION['profissao'] = $profissaos;

	$nomecss = $_SESSION['NmCandidato'];
	$emailss = $_SESSION['Email'];
	$nomeuss = $_SESSION['NmUsuario'];
	$senhass =$_SESSION['Senha'];
	$cepss =$_SESSION['cep'];
	$estadoss =$_SESSION['estado'];
	$cidadess =$_SESSION['cidade'];
	$bairross =$_SESSION['bairro'] ;
	$ruass =$_SESSION['rua'] ;
	$biografiass =$_SESSION['biografia'];
	$experienciasss=$_SESSION['xp'] ;
	$inglesss =$_SESSION['ingles'];
	$formacaoss =$_SESSION['formacao'];
	$profissaoss =$_SESSION['profissao'];
	echo"$nomecss";
	
/*$query = "UPDATE TbCandidatos SET NmUsuario = '$nomeus' ,Senha =  '$senhas', NmCandidato = '$nomecss',
	Email = '$emails' , estado = '$estados',cidade='$cidades',rua= '$ruas' , biografia = '$biografias',bairro= '$bairros', xp = '$experienciass' , ingles = '$ingless' ,
	formacao = '$formacaos', profissao = '$profissaos' where IdCandidato = '$idcandidatos'";*/
	
	$query = "update TbCandidatos set NmCandidato = '$nomecss' , NmUsuario='$nomeuss', Senha= '$senhass', Email = '$emailss', estado = '$estadoss', cidade='$cidadess', cidade = '$ciadess', rua = '$ruass', biografia = '$biografiass', bairro = '$bairross', xp = '$experienciasss', ingles = '$inglesss', formacao = '$formacaoss', profissao = '$profissaoss' where IdCandidato=$idcandidato;";
	$query2 = mysqli_query($conn, $query);
	
	echo"dados alterados";
	
	}
	else{
		echo"Preencha todos os campos";
		
	}
	
}
else{
	
	
	
}
?>			
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