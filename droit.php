<?php
session_start();
include_once("secure.php");
include_once("config.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$coord = $bdd->query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
$result = $bdd->query("SELECT ID, nom, email, rights FROM  users");

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
<nav class="navbar navbar-light bg-faded navA">
  <div class="nav navbar-nav navA">
    <div class="coords">
	<div class="row">
	<div class="col-md-7 left"><p class="welcome"><a href="admin.php"><i class="fa fa-2x fa-home home" aria-hidden="true"></i></a><h5>Bienvenue à votre page</h5></p></div>
	<div class="col-md-5"> <a class="btn logout" href="logout.php">Déconection</a></div> 
	</div>
    <?php	$data1 = $coord->fetchall();
	foreach ($data1 as $about) { 		
		echo "<div class='coordonates'><h4 class='span'>".$about['nom']."</h4>"."<h4 class='span'>".$about['phone']."</h4>"."<h4 class='span'>".$about['adresse']."</h4>"."</div>";
	}?></div>
	<hr class="hr">
	<hr class="hr">
  </div>
</nav>

<button class="btn btnR btnAdmin"><a href="add.php">Ajouter employé</a><br/><br/></button>

	<table class='table table-striped' width='100%'  border=0>
	<tr bgcolor='#C0C0C0' class="head">
    <th>Nom</th>
		<th>Email</th>
		<th>Droits</th>
        <th style='text-align:center'>Changer droit</th>
	</tr>
    
	<?php 
	$data = $result->fetchall();

	foreach ($data as $res) { 		
        echo "<tr>";
        echo "<td class='change'>".$res['nom']."</td>";
		echo "<td class='change'>".$res['email']."</td>";
		echo "<td class='change'>".$res['rights']."</td>";
        echo "<td style='text-align:right'>
		<button class=\"btn btnR btnAdmin\"><a href=\"update_droit.php?User_id=$res[ID]&Niv=0\">Niveau 0</a><br/><br/></button>
    <button class=\"btn btnR btnAdmin\"><a href=\"update_droit.php?User_id=$res[ID]&Niv=1\">Niveau 1</a><br/><br/></button>
    <button class=\"btn btnR btnAdmin\"><a href=\"update_droit.php?User_id=$res[ID]&Niv=2\">Niveau 2</a><br/><br/></button>
	
	</td>";
        echo "</tr>";

	}
	?>
	</table>
	</div>
</body>
</html>