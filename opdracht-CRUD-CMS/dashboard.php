<?php

session_start();

	if(isset($_COOKIE['login']))
	{
		$selectUser = "SELECT salt, hashed_password FROM users WHERE email = :email";
		$db = new PDO("mysql:host=localhost;dbname=opdracht-crud-cms",'root','');
		$email = $_SESSION['email'];
		$controlLogin = $db->prepare($selectUser);
		$controlLogin->bindValue(':email',$_SESSION['email']);
		$controlLogin->execute();
		$saltDatabase = $controlLogin->fetchColumn();
		$hashed_password = $controlLogin->fetch(PDO::FETCH_ASSOC);

		$arrayCookie =  explode(',',$_COOKIE['login']);

		if($saltDatabase = $arrayCookie[1]){
			echo "jep hetzelfde";
		}
		else
		{

		unset($_COOKIE['login']);
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'login-form.php';
		header("Location: http://$host$uri/$extra");
		exit;		}



	}
	else
	{
		echo "geen cookie :(";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'login-form.php';
		header("Location: http://$host$uri/$extra");
		exit;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<h1>Dashboard</h1>
	<a href="logout.php">Uitloggen</a>
</body>
</html>