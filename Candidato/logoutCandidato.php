<?php include_once("../assets/lib/dbconnect.php"); ?>



<?php
session_start();
session_destroy();
header("Location: loginCandidato.php")
?>