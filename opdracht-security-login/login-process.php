<?php

	$db = new PDO("mysql:host=localhost;dbname=opdracht-security-login",'root','');
	$querySelectUser = "SELECT * FROM users WHERE email = :email";
	$queryLoginUser = "SELECT * FROM users WHERE email= :email AND hashed_password = :hashed_password";
	$user = $_POST['email'];


	$selectUser = $db->prepare($querySelectUser);
	$selectUser->bindValue(':email',$user);
	$selectUser->execute();

	$numberUsers = $selectUser->rowCount();

	if($numberUsers>0){

		echo "user is gevonden yes";
	}
	else
	{
		$_SESSION['notification'] = "Je email adres is niet teruggevonden in de database.";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'login-form.php';
		header("Location: http://$host$uri/$extra");
		exit;
	}
?>