<?php

	$querySelect = 'SELECT * FROM brouwers';
	$queryDelete = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';
	$querySelectEdit = 'SELECT * FROM brouwers WHERE brouwernr = :brouwernr';
	$queryUpdate = 'UPDATE brouwers SET brnaam= :brnaam,adres=:adres,postcode=:postcode,gemeente=:gemeente,omzet=:omzet WHERE brouwernr=:brouwernr';
try{
	
	$db = new PDO("mysql:host=localhost;dbname=bieren",'root','');
#confirm-delete/delete
	if (isset($_POST['delete'])){

		$delete->bindValue(':brouwernr',$_POST['delete']);
		$delete = $db->prepare($queryDelete);
		$delete->execute();	
	}
#edit
	if (isset($_POST['update'])){

		$selectStatement->bindValue(':brouwernr',$_POST['update']);
		$selectStatement = $db->prepare($querySelectEdit);
		$selectStatement->execute();
	}
#confirm-edit
	if (isset($_POST['updateBtn'])){
		$update = $db->prepare($queryUpdate);

		$update->bindValue(':brouwernr',$_POST['brouwernr']);
		$update->bindValue(':brnaam', $_POST['brouwernaam']);
		$update->bindValue(':adres', $_POST['adres']);
		$update->bindValue(':postcode', $_POST['postcode']);
		$update->bindValue(':gemeente', $_POST['gemeente']);
		$update->bindValue(':omzet', $_POST['omzet']);
		$update->execute();
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
<h1>Brouwerij <?php= ?> wijzigen</h1>
<form action='index.php' method="post">
	<p>Brouwersnaam</p><input type="text" name="brouwernaam">
	<p>adres</p><input type="text" name="adres">
	<p>postcode</p><input type="text" name="postcode">
	<p>gemeente</p><input type="text" name="gemeente">
	<p>omzet</p><input type="text" name="omzet"><br>
	<button type="submit" name="updateBtn">Update</button>
</form>

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
					<button type="submit" name="update" value="<?= $brouwer['brouwernr'] ?>"><img src="icon-desc.png" alt="del"></button>
				</td>
			</tr>
		<?php endforeach ?>
		</form>
	</tbody>
</table>
</body>
</html>