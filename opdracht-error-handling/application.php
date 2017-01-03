<?php

	$isValid = FALSE;

		function logToFile($boodschap){
					$errorMessage = ($boodschap['time'] . " - " . $boodschap['ip'] . ' type:[' . $boodschap['type'] . "]: " . $boodschap['text'] . "\n\r");
					file_put_contents( 'log.txt', $errorMessage, FILE_APPEND );

	}

try{
	if (isset($_POST['submit'])){
		if (isset($_POST['code'])){
			if(strlen($_POST['code']) !==8){
				throw new Exception("VALIDATION-CODE-LENGTH");
			}
			else
			{
				$isValid = TRUE;
			}
		}
		else
		{
			throw new Exception("SUBMIT-ERROR");
		}
	}
}
catch(Exception $e){
	$message = array();
	$createMessage = FALSE;
	$messageCode = $e->getMessage();


	switch($messageCode){
		case "SUBMIT-ERROR":
		{
			$message['type'] = "error";
			$message['text'] = "Er werd met het formulier geknoeid";
			$message['time'] = '[' . date( 'H:i:s', time() ).']';
			$message['ip'] = $_SERVER['REMOTE_ADDR'];
			logToFile($message);
			$createMessage = TRUE;
			break;
		}
		case "VALIDATION-CODE-LENGTH":
		{
			$message['type'] = "error";
			$message['text'] = "De kortingscode heeft niet de juiste lengte";
			$message['time'] = '[' . date( 'H:i:s', time() ).']';
			$message['ip'] = $_SERVER['REMOTE_ADDR'];
			logToFile($message);
			$createMessage = TRUE;
			break;
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht error handling</title>
	</head>
	<body>
	<?php if($isValid): ?>
		<h1>Kortingscode werkt</h1>
		<p>De gevraagde korting is toegekend</p>
	<?php else: ?>
		<?php if($message): ?>
			<h3><?= $message['text'] ?></h3>
		<?php endif ?>
	<form action="application.php" method="POST">
		<h1>Kortingscode</h1>
		<input type="text" name="code">
		<input type="submit" name="submit" value="verzenden">
	</form>
	<?php endif ?>
	</body>
</html>