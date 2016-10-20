<?php
	$password = 'geheim';
	$username = 'hendrik';
	$bericht = 'niet verzonden';

if (isset($POST['verzenden'])){
	$bericht = "verzonden";
}
?>
<html>
<head>
</head>
<body>
	<p><?php echo $bericht ?></p>
	<h1>Inloggen</h1>
	<form action='opdracht-post.php' method="POST">
		<label>gebruikersnaam: </label>
		<input type='text' name='gebruikersnaam' id='gebruikersnaam'><br>
		<label>wachtwoord: </label>
		<input type='password' name='wachtwoord' id='wachtwoord'>
		<br>
		<input type='submit' name='verzenden' value='verzenden'>
	</form>
</body>
</html>