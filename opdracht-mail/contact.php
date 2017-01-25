<?php
	session_start();


	if(isset($_POST["submit"])) 
	{
		$admin = "hendrikvd@msn.com";
		$email = $_POST['email'];
		$boodschap = $_POST["boodschap"];
		$_SESSION["email"] = $email;
		$_SESSION["boodschap"] = $boodschap;

		if(isset($_POST['copy'])){
			$copy = true;
		}
		else{
			$copy = false;
		}


		try
		{
			$db = new PDO('mysql:host=localhost;dbname=web_backend', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch( PDOException $e )
		{
			$message = 'Connectie mislukt: ' . $e->getMessage();
			echo $message;
		}

				Echo 'Bericht verstuurd';
		$queryToevoegen = $db->prepare('INSERT INTO contact_messages (email,message) VALUES (:email, :boodschap)');
		$queryToevoegen->bindValue(':email', $email);
		$queryToevoegen->bindValue(':boodschap', $boodschap);
		$gelukt = $queryToevoegen->execute();

		session_destroy();
	}

?>