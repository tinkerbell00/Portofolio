<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
}
include_once("config.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$coord = $bdd->query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
$result = $bdd->query("SELECT users.email, horaires.* FROM horaires, users WHERE users.email = '$email' AND users.ID = horaires.id_employe ");
$data1 = $coord->fetchall();
$ID= $data1[0]['ID'];
$ddate=date("Y-m-d H:i:s");
$dateStart = new DateTime($ddate);
$dateStart->setTime(8, 0);
date_default_timezone_set("Europe/Paris");
$arrive = new DateTime($ddate);

if($arrive > $dateStart){
$resultDate = date_diff($dateStart,$arrive);
$retards = $resultDate->format('%h H %i M');
$arr = "UPDATE horaires SET retards = '$retards'  WHERE id_employe =$ID AND semaine = WEEK(DATE(NOW()))";
$sql=$bdd->prepare($arr);
$resultUpdate=$sql->execute();

}

?>
<html>
<head>	
	<title>Homepage</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="project.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-light bg-faded">
  <div class="nav navbar-nav">
    <div class="coords">	<div class="row">
	<div class="col-md-7 left"><p class="welcome"><i class="fa fa-2x fa-home home" aria-hidden="true"></i><h5>Bienvenue à votre page</h5></p></div>
	<div class="col-md-5"> <a class="btn logout" href="logout.php">Déconection</a></div>
	</div>
	<?php	
	foreach ($data1 as $about) { 		
		echo "<h4 class='span'>".$about['nom']."</h4>";
        echo "<h4 class='span'>".$about['phone']."</h4>";
        echo "<h4 class='span'>".$about['adresse']."</h4>";
	}?></div>
  </div>
</nav>
<button class="btn btnR btnAdmin"><a href="update.php">Modifier vos coordones</a><br/><br/></button>
	<table class='table table-striped' width='100%'  border=0>

	<tr bgcolor='#C0C0C0' class="head">
		<th>Horaires</th>
		<th>Semaine</th>
		<th>Mois</th>
		<th>Annee</th>
	</tr>
	<?php 
	$data = $result->fetchall();

	foreach ($data as $res) { 		
        echo "<tr>";
		echo "<td class='change'>".$res['horaires']."</td>";
		echo "<td class='change'>".$res['semaine']."</td>";
		echo "<td class='change'>".$res['mois']."</td>";
		echo "<td class='change'>".$res['annee']."</td>";
	}
	?>
	</table>
	</div>
</body>
</html>