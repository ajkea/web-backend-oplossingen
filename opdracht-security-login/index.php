<?php
	session_start();

	require_once( 'registratie-process.php');

if(isset($_POST['generate'])){


	$test = generateRandomString();

	

	echo $test;

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht security login</title>
	</head>
	<body>
		<h1>Registreren</h1>
	<?php $test ?>
		<form action="index.php" method="post">
			<p>email</p>
			<input type="text" name="email">
			<p>paswoord</p>
			<input type="text" name="paswoord">
			<button name="generate">Genereer een paswoord</button>
			<button name="register">Registreer</button>
		</form>
	</body>
</html>