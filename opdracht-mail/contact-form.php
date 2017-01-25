<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Contactformulier</title>
</head>
<body>
	<h1>Contacteer ons</h1>
	<form action="contact.php" method="post">
		<p>E-mailadres:</p>
		<input type="text" name="email">
		<p>Boodschap</p>
		<input type="textarea" name="boodschap"><br>
		<input type="submit" name="submit" value="verzenden"><br>
		<input type="checkbox" name="copy" value="kopie">Stuur me een kopie!
	</form>
</body>
</html>