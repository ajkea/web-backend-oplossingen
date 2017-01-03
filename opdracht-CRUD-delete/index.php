<?php

	$querySelect = 'SELECT * FROM brouwers';
	$queryDelete = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';

try{
	
	$db = new PDO("mysql:host=localhost;dbname=bieren",'root','');

	if (isset($_POST['delete'])){
		$delete = $db->prepare($queryDelete);
		$delete->bindValue(':brouwernr',$_POST['delete']);
		$delete->execute();	
	}

	$resultaten = $db->prepare($querySelect);
	$resultaten->execute();

	$totalColumn = $resultaten->columnCount();


	$brouwers = array();

	while($result = $resultaten->fetch(PDO::FETCH_ASSOC)){
		$brouwers[] = $result;
	}


	$columnNames = array();
	foreach($brouwers[0] as $key => $bier){
		$columnNames[] = $key;
	}
	$columnNames[$totalColumn+1] = '';
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
	*{
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
<h1>Overzicht van de brouwers</h1>
<table>
	<thead>
		<tr> 
			<?php foreach ($columnNames as $columnName): ?>
			<th><?= $columnName ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	<tbody>
	<form action="index.php" method="post">
		<?php foreach ($brouwers as $key => $brouwer): ?>
			<tr>
				<?php foreach($brouwer as $value): ?>
					<td><?= $value ?></td>
				<?php endforeach ?>
				<td>
					<button type="submit" name="delete" value="<?= $brouwer['brouwernr'] ?>"><img src="icon-delete.png" alt="del"></button>
				</td>
			</tr>
		<?php endforeach ?>
		</form>
	</tbody>
</table>
</body>
</html>