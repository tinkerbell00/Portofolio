<?php
session_start();
include_once("secure.php");
include_once("config.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$coord = $bdd->query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
$ID = $_GET['User_id'];
if(!isset($_GET['week'])){
$ddate=date("Y-m-d");
$date = new DateTime($ddate);
$week = $date->format("W");
}else{
$week = $_GET['week'];
}

//$arr="SELECT * FROM horaires WHERE ID = $ID AND semaine = $week)";
$result = $bdd->query("SELECT * FROM horaires WHERE id_employe = $ID AND semaine = $week");
?>
<html>
<head>	
	<title>Homepage</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="project.css">
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
		<th>Retards</th>
		<th>Vacances</th>
		<th></th>
	</tr>
	<a class="btn btnR before" href="sort_week.php?User_id=<?php echo $ID ?>&week=<?php 
	$prevweek = $week;
	$week = $week-1;
	if($week == 0){
		$week = 52;
	}
	echo $week ?>"><i class="fa fa-chevron-circle-left pre" aria-hidden="true"></i> Previous</a>
	<a class="btn btnR after" href="sort_week.php?User_id=<?php echo $ID ?>&week=<?php 
	$week = $prevweek;
	$week = $week+1;
	if($week > 52){
		$week = 1;
	}
	echo $week ?>">Next <i class="fa fa-chevron-circle-right aft" aria-hidden="true"></i></a>
	<?php 
	$data = $result->fetchall();
echo "<h4 class='sortT'>".'SEMAINE'. ' '.$prevweek."</h4>";

	foreach ($data as $res) { 
        echo "<tr>";
        echo "<td class='change'>".$res['id_employe']."</td>";
		echo "<td class='change'>".$res['horaires']."</td>";
		echo "<td>".$res['retards']."</td>";
		echo "<td>".$res['vacances']."</td>";	
	}
	?>
	</table>
	</div>
</body>
</html>