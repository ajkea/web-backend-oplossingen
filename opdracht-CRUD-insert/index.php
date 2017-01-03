<?php

		$gelukt = false;
if (isset($_POST['submit']))
{
	try{
		$db = new PDO("mysql:host=localhost;dbname=bieren",'root','');
		$brnaam = $_POST['brnaam'];
		$adres = $_POST['adres'];
		$postcode = $_POST['postcode'];
		$gemeente = $_POST['gemeente'];
		$omzet = $_POST['omzet'];

		$gegevens = array($brnaam,$adres,$postcode,$gemeente,$omzet);


		$query = "INSERT INTO brouwers( brnaam, adres, postcode, gemeente, omzet) VALUES (:brnaam, :adres, :postcode, :gemeente, :omzet)";

		$queryDatabase = $db->prepare($query);

		$queryDatabase->bindValue(':brnaam',$brnaam);
		$queryDatabase->bindValue(':adres',$adres);
		$queryDatabase->bindValue(':postcode',$postcode);
		$queryDatabase->bindValue(':gemeente',$gemeente);
		$queryDatabase->bindValue(':omzet',$omzet);
		$gelukt = $queryDatabase->execute();
		if ($gelukt){
		$id = $db->lastInsertId();
		$boodschap = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ";
		}
		else{
			$boodschap = "er is een fout gebeurd bij het toevoegen.";
		}
	}
	catch(PDOException $e){
		echo "De verbinding met de databank is mislukt fout: " . $e;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht insert</title>
	</head>
	<body>
		<h1>Voeg een brouwer toe</h1>
		<?php if($gelukt){echo $boodschap . $id;} ?>
		<form action="index.php" method="post">
			<p>Brouwersnaam</p>
			<input type="text" name="brnaam">
			<p>adres</p>
			<input type="text" name="adres">
			<p>postcode</p>
			<input type="text" name="postcode">
			<p>gemeente</p>
			<input type="text" name="gemeente">
			<p>omzet</p>
			<input type="text" name="omzet">
			<input type="submit" name="submit">
		</form>
	</body>
</html>