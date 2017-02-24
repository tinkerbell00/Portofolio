<?php

session_start();
include_once("config.php");
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$emailempty='';
$passempty ='';
$nomempty = '';
$phoneempty = '';
$adresseempty = '';
$coord = $bdd->query("SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'");
$data1 = $coord->fetchall();
if(isset($_POST['update']))
{	
	
	$email =$_POST['email'];
	$password =$_POST['password'];
	$nom =$_POST['nom'];	
    $phone =$_POST['phone'];
    $adresse =$_POST['adresse'];

	
	// checking empty fields
	if(empty($email) || empty($password) || empty($nom) || empty($phone) || empty($adresse)) {	
			
		if(empty($email)) {
			echo "<font color='red'>Ecrivez l'email.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Ecrivez le nom.</font><br/>";
		}
		
		if(empty($password)) {
			echo "<font color='red'>Ecrivez le mot de passe.</font><br/>";
		}
        if(empty($phone)) {
			echo "<font color='red'>Ecrivez le numero de telephone.</font><br/>";
		}
        if(empty($adresse)) {
			echo "<font color='red'>Ecrivez votre adresse.</font><br/>";
		}


	} else {	
		//updating the table
        $aa = "UPDATE users SET nom='$nom',email='$email',password='$password', phone='$phone', adresse = $adresse WHERE email='$email'";
		echo $aa;
        $result = $bdd->query("UPDATE users SET nom='$nom', email='$email', password='$password', phone='$phone', adresse = '$adresse' WHERE email='$email'");
		
		//redirectig to the display page. In our case, it is index.php
        if($data1[0]['rights']==2){
header("Location: employe.php");
        }
        else if($data1[0]['rights']==1)
		header("Location: admin.php");
	}
}
?>
<?php

foreach ($data1 as $about) { 
  $email =$about['email'];
	$password =$about['password'];
	$nom =$about['nom'];	
    $phone =$about['phone'];
    $adresse =$about['adresse'];  
}
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page protégée par mot de passe</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="project.css">
    </head>
    <body class="body_log">
       
        <nav class="navbar navbar-light bg-faded">
        <form class="form1 text-center" action="update.php" method="post">
        <div class="formLog">
        <i class="fa  fa fa-4X fa-user-circle-o logI" aria-hidden="true"></i>
        <p>Modifier votre coordones</p>
            <p>
            <input class="f_input" type="text" name="email" class="form-control" value="<?php echo $email;?>"/>
            <span class="error"><?php echo "<div>". $emailempty ."</div>" ?></span>
            <input class="f_input" type="password" name="password" class="form-control" value="<?php echo $password;?>"/>
            <span class="error"><?php echo "<div>". $passempty ."</div>"?></span>
            <input class="f_input" type="text" name="nom" class="form-control" value="<?php echo $nom;?>"/>
            <span class="error"><?php echo "<div>". $nomempty."</div>" ?></span>
            <input class="f_input" type="text" name="phone" class="form-control" value="<?php echo $phone;?>"/>
            <span class="error"><?php echo "<div>". $phoneempty ."</div>"?></span>
            <input class="f_input" type="text" name="adresse" class="form-control" value="<?php echo $adresse;?>"/>
            <span class="error"><?php echo "<div>". $adresseempty. "</div>"?></span>
            </br></br>
            <input type="submit" class="btn btnR" name='update' value="Modifier" />
            </p>
            </div>
        </form>
        </nav>
    </body>
</html>