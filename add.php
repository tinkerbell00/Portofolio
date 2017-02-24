<?php
session_start();
$email = $_SESSION['email'];
$password = $_SESSION['password'];
?>
<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="project.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php
include_once("config.php");
$emailempty='';
$passempty ='';
$nomempty = '';
$phoneempty = '';
$adresseempty = '';
if(isset($_POST['Submit'])) {	
$emailE = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$passwordE = $_POST['password'];
$nom = filter_var(trim($_POST['nom']), FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
$adresse = filter_var(trim($_POST['adresse']), FILTER_SANITIZE_STRING);

	if(empty($emailE) || empty($passwordE) || empty($nom) || empty($phone) || empty($adresse)) {
				
		if(empty($emailE)) {
			$userempty = "User field is empty";
		}
		
		if(empty($passwordE)) {
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
		echo "<br/><a class='btn btn-default' href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		$sql=$bdd->prepare("INSERT INTO users (email, password, nom, phone, adresse) VALUES ('$emailE','$passwordE','$nom','$phone','$adresse')");
		$result=$sql->execute();
        echo "<font color='green'>Data added successfully.";
		echo "<br/><a class='btn btn-default' href='admin.php'>View Result</a>";
	}
}
?>
<button class="btn btn-default"><a href="admin.php"><i class="fa fa-2x fa-home" aria-hidden="true"></i></a></button>
	<br/><br/>
     <nav class="navbar navbar-light bg-faded">
        <form class="form1 text-center" action="add.php" method="post">
        <div class="formLog">
        <p>Enter employee coordonates</p>
            <p>
            <input class="f_input" type="text" name="email"class="form-control" placeholder="email"/>
            <span class="error"><?php echo $emailempty ?></span>
            <input class="f_input" type="password" name="password" class="form-control" placeholder="password"/>
            <span class="error"><?php echo $passempty ?></span>
            <input class="f_input" type="text" name="nom" class="form-control" placeholder="name"/>
            <span class="error"><?php echo $nomempty ?></span>
            <input class="f_input" type="text" name="phone" class="form-control" placeholder="phone"/>
            <span class="error"><?php echo $phoneempty ?></span>
            <input class="f_input" type="text" name="adresse" class="form-control" placeholder="adresse"/>
            <span class="error"><?php echo $adresseempty ?></span>
            </br>
            <input type="submit" class="btn btnR" name="Submit" value="Add" />
            </p>
            </div>
        </form>
        </nav>
</body>
</html>