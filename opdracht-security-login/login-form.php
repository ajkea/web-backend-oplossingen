<?php
session_start();
require_once('login-process.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login formulier</title>
</head>
<body>
	<h2><?php echo $_SESSION['notification'] ?>
	<h1>Inloggen</h1>
	<form action="login-process.php" method="post">
		<p>email:</p>
		<input type="type" name="email">
		<p>paswoord</p>
		<input type="text" name="password">
		<input type="submit" name="login" value="login">
	</form>

	<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a>
</body>
</html>