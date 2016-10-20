<?php
//onload bij leeg bericht geeft melding else

	$password = 'geheim';
	$username = 'hendrik';
$isLoggedIn = false;
	$bericht = '';

if (isset($_POST['submit'])){
	//$bericht = "verzonden";
	if($_POST['gebruikersnaam'] == $username && $_POST['wachtwoord'] == $password){
		$bericht = 'Het inloggen is gelukt';
		$isLoggedIn = true;
	}
	else{
		$bericht = 'er is een fout gebeurt bij het inloggen, probeer het opnieuw.';
	}
}
?>
<html>
<head>
</head>
<body>
	
	<?php if (!$isLoggedIn): ?>
	<h1>Inloggen</h1>
	<form action='opdracht-post.php' method="POST">
		<label>gebruikersnaam: (hendrik)</label>
		<input type='text' name='gebruikersnaam' id='gebruikersnaam'><br>
		<label>wachtwoord: (geheim)</label>
		<input type='password' name='wachtwoord' id='wachtwoord'>
		<br>
		<input type='submit' name='submit' value='verzenden'>
	</form>
	<?php else: ?>
		<h1>Welkom</h1>
		<?= $bericht ?>
	<?php endif ?>
</body>
</html>

