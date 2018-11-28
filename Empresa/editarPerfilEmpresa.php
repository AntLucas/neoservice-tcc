<?php include_once("../assets/lib/dbconnect.php"); ?>
<?php 
session_start();
if($_SESSION['Contador'] == 2){
	echo "aeeeee";
	header('Location: editarPerfilEmpresa.php');
	
	$_SESSION['Contador'] = 0; 
}
$_SESSION['Contador'] +=1;
?>


							
<?php

				
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

<!DOCTYPE html>
<html lang="en">
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
    <title>NeoService</title>
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
                <div class="row">
                    <div class="container emp-profile">
					<form method="post" action="alterar.php" enctype="multipart/form-data">
                                <input type="file" name="arquivo" ></input>
								</br>
								<input class="btn btn-primary" type="submit"  value="Alterar Imagem"></input>
								</form>
					<form>
					</form>
            <form method="post">
                <div class="row">
				
                    <div class="col-md-4">
                        <div class="profile-img">
						
                            <img src="../assets/images/fotos/<?php echo"$img"?>" alt=""/>
                            
                               
                        </div>
						
                    </div>
					
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                         <?php echo"$nme";?>
                                    </h5>
                               
                                       

                                    
                                    <p class="proile-rating">ESTRELAS : <span>0/5</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Endereço</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                   <div class="col-md-4">
                        <div class="profile-work">
                            <p>VAGAS</p>
                             <div class="col-md-6">
								<?php
							$if = mysqli_query($conn,"select * from tbvagas where fk_IdEmpresa = '$idempresa';")or die (mysqli_error());
							
							while($ifrow = mysqli_fetch_array($if)){
							$vag = utf8_encode($ifrow['vaga']);
							$sal = utf8_encode($ifrow['salario']);
                          echo"$vag,<br/>R$ $sal<br/><br/>";
							}
							?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							
							<div class="row">
                                            <div class="col-md-6">
                                                <label>Nome de usuário</label>
                                            </div>
                                    <div class="col-md-6">
       							<input type="text" class="form-control" id="usuario"  name="usuario" value="<?php echo"$nmu";?>"required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome da Empresa</label>
                                            </div>
                                    <div class="col-md-6">
       							<input type="text" class="form-control" id="empresa"  name="empresa" value="<?php echo"$nme";?>"required/>
        							</div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Senha</label>
                                            </div>
                                    <div class="col-md-6">
       							<input type="password" class="form-control" id="senha"  name="senha" value="<?php echo"$senha";?>"required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CNPJ</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo "$cnpj";?>"required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Razão Social</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="razao" name="razao" value="<?php echo "$razao";?>"required/>
        							</div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="email" class="form-control" id="email" name="email" value="<?php echo "$email";?>"required/>
        							</div>
                                        </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CEP</label>
                                            </div>
                                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo "$cep ";?>"required/>                
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Rua</label>
                                            </div>
                                            <div class="col-md-6">
       							<input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo "$endereco";?>"required/>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Bairro</label>
                                            </div>
                                            <div class="col-md-6">
       							<input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo "$bairro";?>"required/>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Estado</label>
                                            </div>
                                            <div class="col-md-6">
       							<input type="text" class="form-control" id="estado" name="estado" value="<?php echo "$estado";?>"required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cidade</label>
                                            </div>
                                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cidade"name="cidade" value="<?php echo "$cidade";?>"required/>
                                            </div>
                                        </div>
                                       										
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Número</label>
                                            </div>
                                            <div class="col-md-6">
       							<input type="text" class="form-control" id="numero" name="numero" value="<?php echo "$numero";?>"required/>
                                            </div>
                                        </div>
										
										 <div class="row">
                                            <div class="col-md-12">
                                                <label>Sua biografia</label><br/>
                                                <p> <input type="text" class="form-control" id="biografia" name="biografia" value="<?php echo "$biografia";?>"required/></p>
                                            </div>
                                        </div>
                            </div>
							<input class="btn btn-primary" type="submit" value="Alterar dados">
					<input type="hidden" name ="env" value="altera">
                        </div>
                    </div>
					
                </div>
				
            </form>  


<?php
if(isset($_POST['env']) && $_POST['env'] == "altera"){
	
	if($_POST['usuario'] && $_POST['empresa'] && $_POST['email'] && $_POST['cnpj'] && $_POST['razao'] && $_POST['cep'] && $_POST['cidade'] && $_POST['estado'] && $_POST['bairro'] && $_POST['endereco'] && $_POST['numero'] && $_POST['biografia'] && $_POST['senha']){

	
	
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

	
	
	$usuarios =	$_POST['usuario'];
	$empresas =	$_POST['empresa'];
	$cnpjs =	$_POST['cnpj'];
	$emails =	$_POST['email'];
	$razaos =	$_POST['razao'];
	$ceps =	$_POST['cep'];
	$cidades =	$_POST['cidade'];
	$estados =	$_POST['estado'];
	$bairros =	$_POST['bairro'];
	$enderecos =	$_POST['endereco'];
	$numeros =	$_POST['numero'];
	$biografias = $_POST['biografia'];
	$senhas = $_POST['senha']; 
	
	$_SESSION['NmEmpresa'] = $empresas;
	$_SESSION['NmUsuario'] = $usuarios;
	$_SESSION['Email'] =	$emails;
	$_SESSION['Senha'] = $senhas;
	$_SESSION['cnpj'] = $cnpjs;
	$_SESSION['razao'] = $razaos; 
	$_SESSION['cep'] = $ceps;
	$_SESSION['cidade'] = $cidades;
	$_SESSION['estado'] = $estados;
	$_SESSION['bairro'] = $bairros;
	$_SESSION['endereco'] = $enderecos;
	$_SESSION['numero'] = $numeros;
	$_SESSION['biografia'] = $biografias;
	
	$empresass =utf8_encode($_SESSION['NmEmpresa']);
	$usuarioss=utf8_encode($_SESSION['NmUsuario']);
	$emailss=utf8_encode($_SESSION['Email']);
	$senhass=utf8_encode($_SESSION['Senha']);
	$cnpjss=utf8_encode($_SESSION['cnpj']);
	$razaoss=utf8_encode($_SESSION['razao']);
	$cepss=utf8_encode($_SESSION['cep']);
	$cidadess=utf8_encode($_SESSION['cidade']);
	$estadoss=utf8_encode($_SESSION['estado']);
	$bairross=	utf8_encode($_SESSION['bairro']); 
	$enderecoss=utf8_encode($_SESSION['endereco']);
	$numeross=utf8_encode($_SESSION['numero']);
	$biografiass=utf8_encode($_SESSION['biografia']);
	
	$query = mysqli_query($conn,"UPDATE TbEmpresas SET NmUsuario = '$usuarioss' ,NmEmpresa =  '$empresass', CNPJ = '$cnpjss', Email = '$emailss' , CEP = '$cepss',Endereco= '$enderecoss' , biografia = '$biografiass', Cidade = '$cidadess' , Estado = '$estadoss' , Bairro = '$bairross', Numero = '$numeross' , Razao = '$razaoss', Senha = '$senhass' where IdEmpresa = '$idempresa'")or die(mysqli_error()); 
	
	echo"dados alterados";
	
	}
	else{
		echo"Prrecha todos os campos";
		
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