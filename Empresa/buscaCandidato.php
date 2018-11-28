<?php include_once("../assets/lib/dbconnect.php"); ?>
<?php 
session_start();

?>
<?php
ini_set('display_errors', 0 );
error_reporting(0);
?>


<?php
$_SESSION['Contador'] = 1;
	$pesquisa = $_SESSION['pesquisa'];
	$nmu = utf8_encode($_SESSION['NmUsuario']) ;
	$cnpj = utf8_encode($_SESSION['cnpj']) ;
	$razao =utf8_encode($_SESSION['razao']) ;
	$cep =	utf8_encode($_SESSION['cep']);
	$estado =utf8_encode($_SESSION['estado']);
	$cidade =utf8_encode($_SESSION['cidade']);
	$bairro = utf8_encode($_SESSION['bairro']);
	$endereco =utf8_encode($_SESSION['endereco']);
	$numero =utf8_encode($_SESSION['numero']);
	$biografia =utf8_encode($_SESSION['biografia']);
	$idempresa=  utf8_encode($_SESSION['IdEmpresa']);
	$email = utf8_encode($_SESSION['Email']);
	$senha = utf8_encode($_SESSION['Senha']);
	$nme = utf8_encode($_SESSION['NmEmpresa']);



?>
<?php
						if($_POST['perfil'] && $_POST['perfil']=="perfils"){
						$idemp = $_POST['idd'];
						$_SESSION['idbusca'] = $idemp;
						header('Location: perfilDeCandidato.php');
					
						}
						else{
							
						}

?>


<!DOCTYPE html>
<html lang="pt-br">
<?php
						$imagem = mysqli_query($conn,"select foto from tbempresas where idempresa = $idempresa");
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
                        <span class="user-name"><?php echo"$nme";?>
                        </span>
                        <span class="user-role">Empresa</span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                <div>
                   <form method="post" action="pesquisaEmpresa.php">
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
							$sqli = mysqli_query($conn,"select * from TbCompetencias;");
							while($row = mysqli_fetch_array($sqli)){
							$competencia = utf8_encode($row['competencia']);
							echo"<option value='$competencia'></option>";
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
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Perfil</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="perfilEmpresa.php">Resumo

                                        </a>
                                    </li>
                                    <li>
                                        <a href="editarPerfilEmpresa.php">Editar Perfil</a>
                                    </li>
									
									 <li>
                                        <a href="VagasCadastrarEditarExcluir.php">Vagas</a>
                                    </li>
                                </ul>
                            </div>
							<li class="sidebar">
                            <a href="mapaEmpresa.php">
                                <i class="fa fa-globe"></i>
                                <span>Mapa</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div class="dropdown">

                    <a href="" class="" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-warning notification">
						<?php
						$slqs = mysqli_query($conn,"select a.NmCandidato,
a.IdCandidato,
b.NmEmpresa,
b.IdEmpresa,
c.IdSolicitacao

from tbcandidatos a
inner join tbsolicitacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbempresas b
on b.IdEmpresa = c.fk_IdEmpresa where fk_IdEmpresa=$idempresa") or die (mysqli_error());
						$lins = mysqli_num_rows($slqs);
						echo"$lins";
						?>
						</span>
                    </a>
                     <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                        <div class="notifications-header">
                            <i class="fa fa-bell"></i>
                            Notificações
                        </div>
                        <div class="dropdown-divider"></div>
                     <?php

$slq = mysqli_query($conn,"select a.NmCandidato,
a.IdCandidato,
b.NmEmpresa,
b.IdEmpresa,
c.IdSolicitacao

from tbcandidatos a
inner join tbsolicitacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbempresas b
on b.IdEmpresa = c.fk_IdEmpresa") or die (mysqli_error());
echo"Notificações";

while($lc = @mysqli_fetch_array($slq) ){
	$idemp = $lc['IdEmpresa'];
	$idcand = $lc['IdCandidato'];
	$idsoli = $lc['IdSolicitacao'];
	$nmcandidato = utf8_encode($lc['NmCandidato']);
	$nmempresa= utf8_encode($lc['NmEmpresa']);
	
	$sqlil = mysqli_query($conn,"select * from TbContatos where fk_IdCandidato = '$idcand' and fk_IdEmpresa='$idempresa'");
	$echo = mysqli_num_rows($sqlil);
	
	if($echo>0){
	
	}
		
	else{
	
	?>

                        <a class="dropdown-item" href="chatEmpresa.php">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-exclamation-triangle text-warning border border-warning"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">
										
	<?php
	echo"<br>$nmcandidato Solicitou um contato$echo!<br>";
	


?>
</div>
                                    <div class="notification-time">
                                       <form method="Post" action="iniciarContato.php">
									<input type="hidden" name="pegar" value="<?php echo"$idcand";?>"/>
									<input type="submit" name="a" value="iniciar contato"/>
									
	
									</form>
									
									
                                    </div>
                                </div>
                            </div>
							<?php
										}
}
	


?>


                        </a>
                        <div class="dropdown-divider"></div>
                   
                    </div>
					
					
					
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="chatEmpresa.php"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                        <a class="dropdown-item" href="excluirEmpresa.php"><strong>EXCLUIR CONTA!</strong></a>
                    </div>
                </div>
                <div>
                    <a href="logoutEmpresa.php">
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
				  <h1 class="display-4">Busca de Candidatos</h1><hr>
				  <p class="lead">Resultados pela busca: "<?php echo"$pesquisa";?>"</p>
				  <p class="lead">
				  </p>
				</div>

				
				
				
				
				
			
				
				<div class="row">	
<?php
$sqlpesquisa = mysqli_query($conn,"select * from TbCompetencias where competencia = '$pesquisa'");
		while($ld = @mysqli_fetch_array($sqlpesquisa) ){
		$IdCompetencia = $ld['IdCompetencia'];
		
		
		$sqlpesquisa2 =  mysqli_query($conn,"select * from TbCandidatos as a inner join TbCompetenciaRelacao as b
		on a.IdCandidato = b.fk_IdCandidato
		where b.fk_IdCompetencia = '$IdCompetencia'")or die (mysqli_error());
		while($lc = @mysqli_fetch_array($sqlpesquisa2) ){
		$nmcandidato = utf8_encode($lc['NmCandidato']);
		$biografia = utf8_encode($lc['biografia']);
		$idca = utf8_encode($lc['IdCandidato']);
		$img2 = utf8_encode($lc['foto']);
		
?>				
				  <div class="col-sm-6">
					<div class="card">
					  <h4 class="card-header text-right bg-dark text-white"><?php echo"$nmcandidato";?>
					  <div class="float-left small">
					  <form method="post">
						<input type="submit" class="btn btn-raised btn-danger" title="Ver perfil de Candidato" value="Perfil"/>
						<input type="hidden" name="perfil" value="perfils"/>
						<input type="hidden" name="idd" value="<?php echo"$idca"?>">
						  </form>
					  </div>
					  </h4>
					  <div class="card-body">
						  <div class="image float-right user-r">
							 <img src="../assets/images/fotos/<?php echo"$img2"?>" alt=""/>
						  </div>
						<h4 class="card-title">Informações</h4>
						  <p class="card-text"><?php echo"$biografia";?></p>
					  </div>
					</div>
				  </div>
				<?php
		}
		}
				?>
				</div>

				
				
				
				
				

				</div>

				  <hr>
					
					</div>

					<!-- jQuery first, then Bootstrap JS. -->
            </div>
        </main>
        <!-- page-content" -->
    
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