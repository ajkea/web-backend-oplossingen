<?php
session_start();
	$_SESSION['straat'] = $_POST['straat'];
	$_SESSION['huisnummer'] = $_POST['huisnummer'];
	$_SESSION['gemeente'] = $_POST['gemeente'];
	$_SESSION['postcode'] = $_POST['postcode'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Overzichtspagina</h1>
<ul>
<li>e-mail: <?php echo $_SESSION['email']; ?><a href="opdracht-sessions-gegevens.php" name="</li>
<li>nickame: <?php echo $_SESSION['nickname']; ?></li>
<li>straat: <?php echo $_SESSION['straat']; ?></li>
<li>huisnummer: <?php echo $_SESSION['huisnummer']; ?></li>
<li>gemeente: <?php echo $_SESSION['gemeente']; ?></li>
<li>postcode: <?php echo $_SESSION['postcode']; ?></li>
</ul>
</body>
</html>