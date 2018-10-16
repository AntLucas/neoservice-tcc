<?php include_once("lib/dbconnect.php"); ?>
<?php 
session_start();
$idcandidato = $_SESSION['IdCandidato'];
$sql = mysql_query("SELECT * FROM TbCandidatos where IdCandidato = '$idcandidato'");
$dados = mysql_fetch_assoc($sql);


 if($_SESSION['Contador'] == 2){
	echo "aeeeee";
	header('Location: ../editarPerfilCandidato.php');
	
	$_SESSION['Contador'] = 0; 
}
$_SESSION['Contador'] +=1;
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
							$Usuario = $row['NmUsuario'];
							echo"<option value='$Usuario'></option>";
							}
							?>
							</datalist>
                           
							</form>
							<?php
							if(isset($_POST['env']) && $_POST['env'] == "pesquisar"){
							$_SESSION['pesquisa'] = $_POST['pesquisa'];
								header('Location: ../perfilDeEmpresa.php/');
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
                                        <a href="perfilCandidato.php">Resumo

                                        </a>
                                    </li>
                                    <li>
                                        <a href="editarPerfilCandidato.php">Editar Perfil</a>
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
                        <a href="index.html"><i class="fa fa-envelope"></i></a>
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
                    <a href="../logoutCandidato.php">
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
            <form method="post" action="editarPerfilCandidato.php">
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
                                         <?php echo"$NmC"?>
                                    </h5>
                               
                                        <div class="col-md-6">
                                <input type="text" class="form-control" id="Cuser"name="profissao" value="<?php echo $dados['profissao'];?>"required/>                
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
							$query = mysql_query("SELECT * from TbCompetencias where fk_IdCandidato = $idcandidato");
							while($rowsss = mysql_fetch_array($query)){
								$competencia = $rowsss['competencia'];
                            echo"<p>$competencia</p>";
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
                                <input type="text" class="form-control" id="Cuser"name="nomeu" value="<?php echo $dados['NmUsuario'];?>" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome</label>
                                            </div>
                                    <div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser" name="nomec" value="<?php echo $dados['NmCandidato'];?>" required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>E-mail</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="email" class="form-control" id="Cuser" name="email" value="<?php echo $dados['Email'];?>"required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nova senha</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="password" class="form-control" id="Cuser" name="senha" value="<?php echo $dados['Senha'];?>" required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telefone</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser" name="celular" value="<?php echo $dados['cel'];?>"required/>
        							</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Endereço</label>
                                            </div>
                                	<div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser"name="endereco" value="<?php echo $dados['ende'];?>"required/>
        							</div>           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Sua biografia</label><br/>
                                                <input type="text" class="form-control" name="biografia" value="<?php echo $dados['biografia'];?>"required/>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experiência</label>
                                            </div>
                                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Cuser" name="experiencias" value="<?php echo $dados['xp'];?>"required/>                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Inglês</label>
                                            </div>
                                            <div class="col-md-6">
                                <input type="text" class="form-control" id="Cuser"name="ingles" value="<?php echo $dados['ingles'];?>"required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Formação</label>
                                            </div>
                                            <div class="col-md-6">
       							<input type="text" class="form-control" id="Cuser"  name="formacao" value="<?php echo $dados['formacao'];?>"required/>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
					<input type="submit" value="Alterar dados">
					<input type="hidden" name ="env" value="altera">
                </div>
				
            </form>  


<?php
if($_POST['env'] && $_POST['env'] == "altera"){
	
	if($_POST['nomeu'] && $_POST['senha'] && $_POST['nomec'] && $_POST['email'] && $_POST['celular'] && $_POST['endereco'] && $_POST['biografia'] && $_POST['experiencias'] && $_POST['ingles'] && $_POST['formacao'] && $_POST['profissao'] ){

	
	
	
	
	$nomeu =	$_POST['nomeu'];
	$senha =	$_POST['senha'];
	$nomec =	$_POST['nomec'];
	$email =	$_POST['email'];
	$celular =	$_POST['celular'];
	$endereco =	$_POST['endereco'];
	$biografia =	$_POST['biografia'];
	$experiencias =	$_POST['experiencias'];
	$ingles =	$_POST['ingles'];
	$formacao =	$_POST['formacao'];
	$profissao =	$_POST['profissao'];
	
	$_SESSION['NmCandidato'] = $nomec;
	$_SESSION['NmUsuario'] = $nomeu;
	$_SESSION['Email'] =	$email;
	$_SESSION['Senha'] = $senha;
	
	$query = mysql_query("UPDATE TbCandidatos SET NmUsuario = '$nomeu' ,Senha =  '$senha', NmCandidato = '$nomec', Email = '$email' , cel = '$celular',ende= '$endereco' , biografia = '$biografia', xp = '$experiencias' , ingles = '$ingles' , formacao = '$formacao', profissao = '$profissao' where IdCandidato = '$idcandidato'")or die(mysql_error()); 
	
	echo"dados alterados";
	
	}
	else{
		echo"Prrecha todos os campos";
		
	}
	
}
else{
	echo"nao cliquei";
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
    <script src="assets/js/custom.js"></script>
</body>

</html>