<?php 
$con = @mysql_connect('localhost','root','') or die (mysql_error());
$x1 = mysql_select_db('TCC',$con) or die (mysql_error());
?>



<?php
session_start();
session_destroy();
header("Location: ../loginCandidato.php")
?>