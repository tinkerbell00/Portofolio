<?php
session_start();
include_once("config.php");
if(isset($_POST) && !empty($_POST)){
$email = $_POST['email'];
$password = $_POST['password'];
$req=$bdd->query("SELECT`email`,`password`, `rights` FROM `users`;");
$data=$req->fetchall();
        $co=false;
        foreach ($data as $value) {
            if ($_POST['email']==$value['email']&& $_POST['password']==$value['password'] && $value['rights']==1) {
                $co=true;
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['rights'] = $value['rights'];
                if ($co){
                     header('Location: admin.php');
                }
            }  
elseif ($_POST['email']==$value['email']&& $_POST['password']==$value['password'] && $value['rights']==2) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
            header('Location: employe.php');
} elseif ($_POST['email']==$value['email']&& $_POST['password']==$value['password'] && empty($value['rights'])) {
           header('Location: register.php');

}

else {
    echo 'Wrong user or password'; 
}
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
         <nav class="navbar navbar-light bg-faded log_nav">
        <form class="form1" action="login.php" method="post" class="form-inline float-xs-left">
            <div class="formLog">
            <i class="fa  fa fa-5X fa-user-circle logI" aria-hidden="true"></i>  
            <p>Entrer email et mot de passe</p>
            <p>
            <i class="fa fa-user logI" aria-hidden="true"></i>
            <input class="f_input" type="text" placeholder="Email" name="email" class="form-control"/>
            </br><i class="fa fa-lock logI" aria-hidden="true"></i>
            <input class="f_input" type="password" placeholder="Password" name="password" class="form-control"/>
            </br>
            </br>
            <input type="submit" class="btn btnR" value="Login" />
            <a class="btn btnR" href="register.php">Enregistrer</a>
            </p>
            </div>
        </form>
        </nav>
    </body>
</html>