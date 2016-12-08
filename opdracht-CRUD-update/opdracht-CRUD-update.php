<?php

	$message			=	false;
	$deleteConfirm		=	false;
	$deleteId			=	false;
	$brouwersEdit		=	false;	

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '' );

		if ( isset( $_POST[ 'confirm-delete' ] ) )
		{
			$deleteConfirm	=	true;
			$deleteId		=	$_POST[ 'confirm-delete' ];
		}

		if ( isset( $_POST[ 'confirm-edit' ] ) )
		{
			$brouwersEdit	=	query( $db, 'SELECT * FROM brouwers WHERE brouwernr = :brouwernr', array( ':brouwernr' => $_POST[ 'confirm-edit' ] ) );
		}

		if ( isset( $_POST[ 'edit' ] ) )
		{

			$updateQuery	=	'UPDATE brouwers
									SET brnaam 			=	:brnaam,
											adres		=	:adres,
											postcode	=	:postcode,
											gemeente	=	:gemeente,
											omzet		=	:omzet
									WHERE brouwernr	= :brouwernr
									LIMIT 1';

			$statement = $db->prepare( $updateQuery );
			
			$statement->bindValue( ":brouwernr",  $_POST[ 'brouwernr' ] );						
			$statement->bindValue( ":brnaam",  $_POST[ 'brnaam' ] );						
			$statement->bindValue( ":adres",  $_POST[ 'adres' ] );						
			$statement->bindValue( ":postcode",  $_POST[ 'postcode' ] );						
			$statement->bindValue( ":gemeente",  $_POST[ 'gemeente' ] );						
			$statement->bindValue( ":omzet",  $_POST[ 'omzet' ] );

			$updateSuccessful	=	$statement->execute();

			if ( $updateSuccessful )
			{
				$message['type']	=	'success';
				$message['text']	=	'Update on brewer ' . $_POST[ 'brnaam' ] . ' succesful';
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Error at brewer ' . $_POST[ 'brnaam' ] . ' failed to execute. Try again. If this problem keeps happening contact <a href="mailto:bilgates@microsoft.com">systeembeheerder</a>.';
			}			

		}

		if ( isset( $_POST['delete'] ) )
		{
			$deleteQuery	=	'DELETE FROM brouwers
									WHERE brouwernr = :brouwernr';

			$deleteStatement = $db->prepare( $deleteQuery );

			$deleteStatement->bindValue( ':brouwernr', $_POST['delete'] );

			$isDeleted 	=	$deleteStatement->execute();

			if ( $isDeleted )
			{
				$message['type']	=	'success';
				$message['text']	=	'Delete record succesful';
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Delete record failed, error: ' . $deleteStatement->errorInfo()[2];
			}
		}

		$brouwersQuery	=	query( $db, 'SELECT * FROM brouwers' ) ;

		$brouwersFieldnames	= 	$brouwersQuery[ 'fieldnames' ];
		$brouwers			=	$brouwersQuery[ 'data' ];

	}
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'Connection failed';
	}
	
	function query( $db, $query, $tokens = false )
	{
		$statement = $db->prepare( $query );
		
		if ( $tokens )
		{
			foreach ( $tokens as $token => $tokenValue )
			{
				$statement->bindValue( $token, $tokenValue );
			}
		}

		$statement->execute();

		/*  Veldnamen ophalen*/
		$fieldnames	=	array();

		for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
		{
			$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber )['name'];
		}

		/*De brouwer-data ophalen*/
		$data	=	array();

		while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
		{
			$data[]	=	$row;
		}

		$returnArray['fieldnames']	=	$fieldnames;
		$returnArray['data']		=	$data;

		return $returnArray;
	}
	

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing oefening 026 - a</title>
		<style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}

			.success
			{
				background-color:lightgreen;
			}

			.error
			{
				background-color:red;
			}

			.delete-button
			{
				background-color	:	transparent;
				border				:	none;
				padding				:	0px;
				cursor				:	pointer;
			}

			.confirm-delete
			{
				background-color	:	red;
				color				: 	white;
			}
		</style>
	</head>
<body>
	<?php if ( $message ): ?>
		<div class="modal <?= $message[ "type" ] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>	

	<?php if ( $brouwersEdit ): ?>
		<div>
			<form action="<?= $_SERVER[ 'PHP_SELF' ] ?>" method="POST">
				<ul>
					<?php foreach ($brouwersEdit['data'][0] as $fieldname => $value): ?>
						
						<?php if ( $fieldname != "brouwernr" ): ?>
							<li>
								<label for="<?= $fieldname ?>"><?= $fieldname ?></label>
								<input type="text" id="<?= $fieldname ?>" name="<?= $fieldname ?>" value="<?= $value ?>">
							</li>
						<?php endif ?>
						
					<?php endforeach ?>
				</ul>
				<input type="hidden" value="<?= $brouwersEdit['data'][0]['brouwernr'] ?>" name="brouwernr">
				<input type="submit" name="edit" value="Wijzigen">
			</form>
		</div>
	<?php endif ?>	

	<?php if ( $deleteConfirm ): ?>
		<div>
			Are u sure?
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

				<button type="submit" name="delete" value="<?= $deleteId ?>">
					Absoluut zeker!
				</button>

				<button type="submit">
					Ongedaan maken
				</button>

			</form>
		</div>
	<?php endif ?>
	
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<table>
			
			<thead>
				<tr>
					<?php foreach ($brouwersFieldnames as $fieldname): ?>
						<th><?= $fieldname ?></th>
					<?php endforeach ?>
					<th></th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($brouwers as $key => $brouwer): ?>
					<tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?> <?= ( $brouwer['brouwernr'] === $deleteId ) ? 'confirm-delete' : ''  ?>">
						<?php foreach ($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<button type="submit" name="confirm-delete" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="icon-delete.png" alt="Delete button">
							</button>
						</td>
						<td>
							<button type="submit" name="confirm-edit" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
								<img src="icon-edit.png" alt="Edit button">
							</button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>

</body>
</html>