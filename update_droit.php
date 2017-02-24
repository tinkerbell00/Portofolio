<?php
session_start();
include_once("secure.php");
include_once("config.php");
$ID = $_GET['User_id'];
$rights = $_GET['Niv'];

     $update = $bdd->query("UPDATE users SET  rights = '$rights' WHERE ID='$ID'");
     header("Location: droit.php");
?>