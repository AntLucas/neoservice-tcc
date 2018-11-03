<?php include_once("../lib/dbconnect.php"); ?>



<?php
session_start();
session_destroy();
header("Location: loginCandidato.php")
?>