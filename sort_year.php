<?php
session_start();
include_once("secure.php");
include_once("config.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$coord = $bdd->query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
$ID = $_GET['User_id'];
if(!isset($_GET['annee'])){
$ddate=date("Y-m-d");
$date = new DateTime($ddate);
$year = $date->format("Y");
}else{
$year = $_GET['annee'];
}
//$arr="SELECT * FROM horaires WHERE ID = $ID AND semaine = $year)";
$result = $bdd->query("SELECT * FROM horaires WHERE id_employe = $ID AND annee = $year");
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
    <div class="coords">
	<button class="btn btn-default"><a href="admin.php"><i class="fa fa-2x fa-home" aria-hidden="true"></i></a></button>
	<?php	$data1 = $coord->fetchall();

	foreach ($data1 as $about) { 		
		echo "<h4 class='span'>".$about['nom']."</h4>";
        echo "<h4 class='span'>".$about['phone']."</h4>";
        echo "<h4 class='span'>".$about['adresse']."</h4>";
	}?></div>
  </div>
</nav>
	<table class='table table-striped' width='100%'  border=0>

	<tr bgcolor='#C0C0C0' class="head">
    <th>Id_employe</th>
		<th>Horaires</th>
		<th>Semaine</th>
		<th>Mois</th>
		<th>Retards</th>
		<th>Vacances</th>
		<th></th>
	</tr>
	
	<a class="btn btnR before" href="sort_year.php?User_id=<?php echo $ID ?>&annee=<?php 
	$prevyear = $year;
	$year = $year - 1;
	echo $year ?>"><i class="fa fa-chevron-circle-left pre" aria-hidden="true"></i> Previous </a>
	<a class="btn btnR before" href="sort_year.php?User_id=<?php echo $ID ?>&annee=<?php 
	$year = $prevyear;
	$year = $year + 1;
	echo $year ?>">Next <i class="fa  fa-chevron-circle-right aft" aria-hidden="true"></i></a>

	<?php 
	$data = $result->fetchall();

echo "<h4 class='sortT'>".'ANNEE'. ' '.$prevyear."</h4>";
	foreach ($data as $res) { 
        echo "<tr>";
        echo "<td class='change'>".$res['id_employe']."</td>";
		echo "<td class='change'>".$res['horaires']."</td>";
		echo "<td class='change'>".$res['semaine']."</td>";
		echo "<td class='change'>".$res['mois']."</td>";
		echo "<td>".$res['retards']."</td>";
		echo "<td>".$res['vacances']."</td>";	
	}
	?>
	</table>
	</div>
</body>
</html>