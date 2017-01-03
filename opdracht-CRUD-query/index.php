<?php

$sqlQuery = 'SELECT * FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr WHERE bieren.naam LIKE "Du%" AND brouwers.brnaam LIKE "%a%"';

try{
	$db = new PDO("mysql:host=localhost;dbname=bieren",'root','');
	echo "connection succeeded";

	$resultaten = $db->prepare($sqlQuery);
	$resultaten->execute();

	$totalColumn = $resultaten->columnCount();
	echo $totalColumn;


	$bieren = array();

	while($result = $resultaten->fetch(PDO::FETCH_ASSOC)){
		$bieren[] = $result;
	}


	$columnNames = array();
	foreach($bieren[0] as $key => $bier){
		$columnNames[] = $key;
	}
	static $i = 0;

}
catch(PDOException $e){
	echo "connection failed " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>sql query opdracht</title>
	<style>
	thead{
		font-family: arial;
	}

	table tr:nth-child(even) {
	    background-color: #eee;
	}
	table tr:nth-child(odd) {
	   background-color:#fff;
	}

	</style>
</head>
<body>
<h1>Overzicht van de bieren</h1>
<table>
	<thead>
		<tr> 
			<?php foreach ($columnNames as $columnName): ?>
			<th><?= $columnName ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($bieren as $key => $bier): ?>
			<tr>
			<?php foreach($bier as $value): ?>
				<td><?= $value ?></td>
			<?php endforeach ?>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</body>
</html>