<html>
<head>
	<title>Add Data</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="project.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<a href="admin.php">Home</a>
	<br/><br/>
     <nav class="navbar navbar-light bg-faded">
        <form class="form1 text-center" action="add.php" method="post">
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
            <input type="submit" class="btn btnR" name="Submit" value="Add" />
            </p>
        </form>
        </nav>
</body>
</html>