<?php include_once("lib/dbconnect.php"); ?>
<?php 
session_start();
$fkid =$_SESSION['IdEmpresa'];


 if($_SESSION['Contador'] == 2){
	echo "aeeeee";
	header('Location: VagasCadastrar.php');
	
	$_SESSION['Contador'] = 0; 
}
$_SESSION['Contador'] +=1;
?>
<?php
$idempresa=  $_SESSION['IdEmpresa'];
$email = $_SESSION['Email'];
$senha = $_SESSION['Senha'];
$nme = $_SESSION['NmEmpresa'];
$nmu = $_SESSION['NmUsuario'];

$sql = mysql_query("select * from TbEmpresas  where Email = '$email' and Senha = '$senha';")or die(mysql_error()); 
while($rowss = mysql_fetch_array($sql)){
	$cnpj = $rowss['CNPJ'];
	$razao = $rowss['Razao'];
	$cep = $rowss['CEP'];
	$estado = $rowss['Estado'];
	$cidade = $rowss['Cidade'];
	$bairro = $rowss['Bairro'];
	$endereco = $rowss['Endereco'];
	$numero = $rowss['Numero'];
	$complemento = $rowss['Complemento'];
	$biografia = $rowss['biografia'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>NeoService - Vagas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/custom-themes.css">
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
	<link rel="stylesheet" href="assets/css/styleCandidato.css">
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
                        <img class="img-responsive img-rounded" src="images/user.jpg" alt="User picture">
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
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Pesquise...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
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
                            <a href="mapa.html">
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

                    <a href="" class="" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-warning notification">3</span>
                    </a>
                     <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                        <div class="notifications-header">
                            <i class="fa fa-bell"></i>
                            Notificações
                        </div>
                        <div class="dropdown-divider"></div>
                     <?php

$slq = mysql_query("select a.NmCandidato,
a.IdCandidato,
b.NmEmpresa,
b.IdEmpresa,
c.IdSolicitacao

from tbcandidatos a
inner join tbsolicitacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbempresas b
on b.IdEmpresa = c.fk_IdEmpresa") or die (mysql_error());
echo"Notificações";

while($lc = @mysql_fetch_array($slq) ){
	$idemp = $lc['IdEmpresa'];
	$idcand = $lc['IdCandidato'];
	$idsoli = $lc['IdSolicitacao'];
	$nmcandidato = $lc['NmCandidato'];
	$nmempresa= $lc['NmEmpresa'];
	
	$sqlil = mysql_query("select * from TbContatos where fk_IdCandidato = '$idcand' and fk_IdEmpresa='$fkid'");
	$echo = mysql_num_rows($sqlil);
	
	if($echo>=1){
	
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
	echo"<br>$nmcandidato Solicitou um contato!<br>";
	


?>
</div>
                                    <div class="notification-time">
                                       <form method="Post" action="">
									<input type="hidden" name="pegar" value="<?php echo"$idcand";?>"/>
									<input type="submit" name="a" value="iniciar contato"/>
									<input type="hidden" name="env2" value="clicou"/>
	
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
                        <a class="dropdown-item text-center" href="#">View all notifications</a>
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
                        <a class="dropdown-item" href="#">Ajuda</a>
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
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="images/user.jpg" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Alterar
                                <input type="file" name="file"/>
                            </div>
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
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cadastrar Vagas</a>
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
							$if = mysql_query("select * from tbvagas where fk_IdEmpresa = '$idempresa';")or die (mysql_error());
							
							while($ifrow = mysql_fetch_array($if)){
							$vag = $ifrow['vaga'];
							$sal = $ifrow['salario'];
                            echo"<p>$vag, R$ $sal<p><br/>";
							}
							?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							<form>
							</form>
                            	<form method="post">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nome Da Vaga</label><br/>
                                            </div>
                                            <div class="col-md-6">
                                        <input type="text" class="form-control"  name="nome" placeholder="Digite a Vaga"required/><br/>
                                            </div>
                                        </div>
                                        
                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Sálario</label>
                                            </div>
                                            <div class="col-md-6">
                                        <input type="text" class="form-control"  name="salario" placeholder="Digite o Sálario"required/><br/>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Horario</label><br/>
                                            </div>
                                            <div class="col-md-6">
                                        <input type="text" class="form-control"  name="horario" placeholder="Digite o Horario"required/><br/>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <label>Descrição</label><br/><br/>
                                            </div>
                                            <div class="col-md-6">
                                        <input type="text" class="form-control"  name="descricao" placeholder="Digite a Descrição"required/><br/>
                                            </div>
                                        </div>
                                
                   		
                                         <div class="row">
                                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
								<input type="hidden" name="cad" value="cadastrar"/>
                                            </div>
                                        </div>
                              	</form>
								<?php
								if($_POST['cad'] && $_POST['cad']=="cadastrar"){
									$nome = $_POST['nome'];
									$salario = $_POST['salario'];
									$horario = $_POST['horario'];
									$descricao = $_POST['descricao'];
									
									if(mysql_query("insert into tbvagas (fk_idempresa,vaga,salario,horario,descricao)
										values('$idempresa','$nome','$salario','$horario','$descricao')")){
											echo"aeee";
										}
										else{
											echo"aaaaaaa";
										}
								}
								else{
									echo"uuuhh";
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
    <script src="assets/js/custom.js"></script>
</body>

</html>