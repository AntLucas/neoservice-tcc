<?php
 include_once("../assets/lib/dbconnect.php"); 
session_start();
							if(isset($_POST['env']) && $_POST['env'] == "pesquisar"){
							$_SESSION['pesquisa'] = $_POST['pesquisa'];
								header('Location: buscaCandidato.php');
									}
									else{
										header('Location: perfilEmpresa.php');
											}

							?>