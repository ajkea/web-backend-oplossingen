<?php
session_start();

if (isset($_POST['submit'])){
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['nickname'] = $_POST['nickname'];
}
?>
<html>
	<head>
		<title>Opdracht sessions registratie form</title>
	</head>
	<body>
		<h1>Deel 1: registratiegegevens</h1>
		<form action="opdracht-sessions-gegevens.php" method="post"><p>e-mail</p>
			<input type="text" name="email" >
			<p>nickname</p>
			<input type="text" name="nickname" >
			<input type="submit" name="submit">
		</form>
	</body>
</html>
