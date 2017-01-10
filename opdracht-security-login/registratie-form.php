<?php
	session_start();
	require_once( 'registratie-process.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht security login</title>
	</head>
	<body>
	<h2><?php echo $_SESSION['notification'] ?></h2>
		<h1>Registreren</h1>
		<form action="registratie-form.php" method="post">
			<p>email</p>
			<input type="text" name="email" value="<?= $_SESSION['email'] ?>">
			<p>paswoord</p>
			<input type="text" name="password" value="<?= $_SESSION['password'] ?>">
			<button name="generate">Genereer een paswoord</button>
			<button name="register">Registreer</button>
		</form>
	</body>
</html>