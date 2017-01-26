<?php
session_start(); 
if (isset($_GET["zoeken"])) 
{
	$zoekterm=$_GET["zoeken"];
	$message="";
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=artikel', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
	}
	catch ( PDOException $e )
	{
		$message='No Connection: ' . $e->getMessage();
	}
	$query=$db->prepare('SELECT * FROM artikels WHERE Artikel LIKE :term');
	$query->bindValue(":term", "%".$zoekterm."%");
	$query->execute();
	$queryresult=array();
	while ($row=$query->fetch()) 
	{
		array_push($queryresult,$row);
	}
}
	if (isset($_GET["jaartal"])) 
	{
	$zoekterm=$_GET["jaartal"];
	$message="";
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=artikel', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
	}
	catch ( PDOException $e )
	{
		$message='No Connection: ' . $e->getMessage();
	}
	$query=$db->prepare('SELECT * FROM artikels WHERE datum LIKE :datum');
	$query->bindValue(":datum", "%".$zoekterm."%");
	$query->execute();
	$queryresult=array();
	while ($row=$query->fetch()) 
	{
		array_push($queryresult,$row);
	}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Overzicht</title>
	<style>
		.grey{
			background-color: grey;
		}
		article{
			border: 2px solid black;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	 <p><?php if (isset($_SESSION["notification"])) 
 	{
 	echo $_SESSION["notification"];
 	}
 	?>
	<h1><?=$zoekterm ?></h1>
	 <?php for ($i=0; $i < count($queryresult) ; $i++): ?>
 	 		<article>
 	 			<h1><?=$queryresult[$i]["Titel"]?></h1>
 	 			<p><?=$queryresult[$i]["datum"]?></p>
 	 			<p><?=$queryresult[$i]["Artikel"]?></p>
 	 			<p>Kernwoorden: <?=$queryresult[$i]["kernwoorden"] ?></p>
 	 		</article>
		<?php endfor ?>
</body>
</html>