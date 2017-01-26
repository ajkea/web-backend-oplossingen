<?php 
session_start();
if (isset($_POST["submit"])) 
{
		$_SESSION["titel"]=$_POST["titel"];
		$_SESSION["artikel"]=$_POST["artikel"];
		$_SESSION["kern"]=$_POST["kern"];
		$_SESSION["datum"]=$_POST["datum"];
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=artikel', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
	}
	catch ( PDOException $e )
	{
		$message='No Connection: ' . $e->getMessage();
	}
	$query=$db->prepare('INSERT INTO artikels (titel,artikel,kernwoorden,datum) VALUES (:titel,:artikel,:kernwoorden,:datum)');
	$query->bindValue(":titel", $_POST["titel"]);
	$query->bindValue(":artikel", $_POST["artikel"]);
	$query->bindValue(":kernwoorden", $_POST["kern"]);
	$query->bindValue(":datum", $_POST["datum"]);
	$success=$query->execute();
	if ($success) 
	{
			$_SESSION["notification"]="Artikel toegevoegd!";
			header("Location: ../artikels/"); /* Redirect browser */
			exit();
	}
	else
	{
			$_SESSION["notification"]="Artikel kon niet worden toegevoegd";
			header("Location: ../toevoegen/"); /* Redirect browser */
			exit();
	}
}
 ?>