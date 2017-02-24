<?php
session_start();
include_once("secure.php");
include_once("config.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$coord = $bdd->query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
$ID = $_GET['User_id'];
$arr="SELECT * FROM horaires WHERE ID = $ID AND semaine = WEEK(DATE(NOW()))";
$result = $bdd->query("SELECT * FROM horaires WHERE ID = $ID AND semaine = WEEK(DATE(NOW()))");
if(isset($_POST) && !empty($_POST)){
$retards = $_POST['retards'];
$vacances = $_POST['vacances'];
$arr = "UPDATE horaires SET retards = '$retards' ,vacances='$vacances'  WHERE id_employe =$ID AND semaine = WEEK(DATE(NOW()))";
$sql=$bdd->prepare($arr);
$result=$sql->execute();
header('Location: admin.php');
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
	<?php 
	$data = $result->fetchall();
    if(isset($data[0])){
echo "<h4 class='sortT'>".'Semaine'. ' '.$data[0]['semaine']."</h4>";
    }

	foreach ($data as $res) { 
        echo "<tr>";
        echo "<td class='change'>".$res['id_employe']."</td>";
		echo "<td class='change'>".$res['horaires']."</td>";
		echo "<td>".$res['retards']."</td>";
		echo "<td>".$res['vacances']."</td>";	
	}
	?>
	</table>
     <form class="form1" action="retard.php?User_id=<?php echo $ID ?>" method="post" class="form-inline float-xs-left">
            <p>Ajout retard ou vacance</p>
            <p>
            <input class="ajout" type="text" name="retards" placeholder="Retard" class="form-control"/>
            <input class="ajout" type="text" name="vacances" placeholder="Vacance" class="form-control"/>
            <input type="submit" class="btn btnR" value="Ajout" />
            </p>
        </form>
	</div>
</body>
</html>