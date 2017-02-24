<?php
session_start();
include_once("secure.php");
include_once("config.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$coord = $bdd->query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
$ID = $_GET['User_id'];
if(!isset($_GET['mois'])){
$ddate=date("Y-m-d");
$date = new DateTime($ddate);
$month = $date->format("m");
}else{
$month = $_GET['mois'];
}
$result = $bdd->query("SELECT * FROM horaires WHERE id_employe = $ID AND mois = $month");
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
<?php	
$data1 = $coord->fetchall();
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
		<th>Retards</th>
		<th>Vacances</th>
		<th></th>
	</tr>
	<a class="btn btnR before" href="sort_mois.php?User_id=<?php echo $ID ?>&mois=<?php
	$prevmonth = $month;
	$month = $month - 1;
	if($month == 0){
		$month = 12;
	}
	 echo $month ?>"><i class="fa fa-chevron-circle-left pre" aria-hidden="true"></i> Previous</a>
	<a class="btn btnR after" href="sort_mois.php?User_id=<?php echo $ID ?>&mois=<?php 
	$month = $prevmonth;
	$month = $month +1;
	if($month > 12){
		$month = 1;
	}
	echo $month ?>">Next <i class="fa fa-chevron-circle-right aft" aria-hidden="true"></i></a>
	<?php 
	$data = $result->fetchall();

echo "<h4 class='sortT'>".'MOIS'. ' '.$prevmonth."</h4>";
    	foreach ($data as $res) { 
        echo "<tr>";
        echo "<td class='change'>".$res['id_employe']."</td>";
		echo "<td class='change'>".$res['horaires']."</td>";
		echo "<td class='change'>".$res['semaine']."</td>";
		echo "<td>".$res['retards']."</td>";
		echo "<td>".$res['vacances']."</td>";	
	}
	?>
	</table>
	</div>
</body>
</html>