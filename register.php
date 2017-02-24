<?php
include_once("config.php");
$emailempty='';
$passempty ='';
$nomempty = '';
$phoneempty = '';
$adresseempty = '';
if(isset($_POST) && !empty($_POST)){
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
$nom = filter_var(trim($_POST['nom']), FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
$adresse = filter_var(trim($_POST['adresse']), FILTER_SANITIZE_STRING);
//$passwordV = password_hash($_POST['password'], PASSWORD_DEFAULT)."\n";
if(empty($email) || empty($password) || empty($nom) || empty($phone) || empty($adresse)) {	
			
		if(empty($email)) {
			$userempty = "User field is empty";
		}
		
		if(empty($password)) {
			$passempty = "Password is empty";
        }
        if(empty($nom)) {
			$nomempty = "Name is empty";
        }
        if(empty($phone)) {
			$phoneempty = "Phone is empty";
        }
        if(empty($adresse)) {
			$adresseempty = "Adresse is empty";
        }
} else {
$mail = ['danarednic00@gmail.com'];
$sujet = "New user !";
$link= "http://localhost/projects/projet%20vacances/droit.php";
$message = 'Registration '. $email ."  ".$nom." " .$link.".";

foreach($mail as $mailN){
if (mail($mailN, $sujet, $message,'From:tes00app@gmail.com')){
  $success = 'email sent to '. $mailN .'<br>';
  echo $success;
}else{
  echo 'Message not sent to '. $mailN .'<br>';  
}
}
$arr = "INSERT INTO users (email, password, nom, phone, adresse) VALUES ('".$email."','".$password."','".$nom."','".$phone."','".$adresse."')";

$sql=$bdd->prepare($arr);
$result=$sql->execute();
echo $result;
header("Location: confirm.php");
}
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
        <form class="form1 text-center" action="register.php" method="post">
        <div class="formLog">
        <i class="fa  fa fa-4X fa-user-circle-o logI" aria-hidden="true"></i>
        <p>Enter your coordonates</p>
            <p>
            <input class="f_input" type="text" name="email" class="form-control" placeholder="email"/>
            <span class="error"><?php echo "<div>". $emailempty ."</div>" ?></span>
            <input class="f_input" type="password" name="password" class="form-control" placeholder="password"/>
            <span class="error"><?php echo "<div>". $passempty ."</div>"?></span>
            <input class="f_input" type="text" name="nom" class="form-control" placeholder="name"/>
            <span class="error"><?php echo "<div>". $nomempty."</div>" ?></span>
            <input class="f_input" type="text" name="phone" class="form-control" placeholder="phone"/>
            <span class="error"><?php echo "<div>". $phoneempty ."</div>"?></span>
            <input class="f_input" type="text" name="adresse" class="form-control" placeholder="adresse"/>
            <span class="error"><?php echo "<div>". $adresseempty. "</div>"?></span>
            </br></br>
            <input type="submit" class="btn btnR" value="Register" />
            </p>
            </div>
        </form>
        </nav>
    </body>
</html>