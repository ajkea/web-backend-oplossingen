<?php
session_start();

	$_SESSION['email'] = $_POST['email'];
	$_SESSION['nickname'] = $_POST['nickname'];
	if (isset($_POST['submit2'])){
	$_SESSION['straat'] = $_POST['straat'];
	$_SESSION['huisnummer'] = $_POST['huisnummer'];
	$_SESSION['gemeente'] = $_POST['gemeente'];
	$_SESSION['postcode'] = $_POST['postcode'];
}

?>
<html>
<head>
	<title>Opdracht sessions deel 2</title>
</head>
<body>
	<h1>Registratiegegevens</h1>
	<ul>
		<li>e-mail: <?php echo $_SESSION['email']; ?></li>
		<li>nickname: <?php echo $_SESSION['nickname']; ?></li>
	</ul>
	<h1>Deel 2: adres</h1>
	<form action="opdracht-sessions-overzicht.php" method="post">
		<p>straat:</p>
		<input type="text" name="straat">
		<p>nummer:</p>
		<input type="number" min="1" max="500" name="huisnummer">
		<p>gemeente</p>
		<input type="text" name="gemeente">
		<p>postcode</p>
		<input type="number" min="1000" max="9990" step="10" name="postcode">
		<br>
		<input type="submit" name="submit2" value="verzenden">
	</form>
</body>
</html>
