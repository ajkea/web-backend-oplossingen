<?php
$cookies = file_get_contents("cookies.txt");
$login = explode(",",$cookies);
$waarschuwing = false;
$isAangemeld = false;

if (isset($_GET['logout'])){
	setcookie("aangemeld",'',time() - 100);
	header('location: opdracht-cookies-login.php');
}


if( !isset($_COOKIE['aangemeld'])){
	if (isset($_POST['button'])){
		if( $_POST['gebruikersnaam'] == $login[0] && $_POST['wachtwoord'] == $login[1]){
			setcookie("aangemeld",true,time() + 360);
			setcookie("username",$_POST['gebruikersnaam'],time() + 360);
			$waarschuwing = "";
			header('location: opdracht-cookies-login.php');
		}
		else
		{
			$waarschuwing = "<b>Gebruikersnaam en/of wachtwoord zijn niet correct. probeer opnieuw</b>";
		}
	}
}
else
{
	$isAangemeld = true;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php if(!$isAangemeld): ?>
	<h1>Inloggen</h1>
	<?= $waarschuwing ?>
	<form action="opdracht-cookies-login.php" method="post">
	<p>gebruikersnaam</p>
	<input type="text" name="gebruikersnaam">
	<p>wachtwoord</p>
	<input type="text" name="wachtwoord">
	<input type="submit" name="button" value="submit query">
</form>
<?php else: ?>
	<h1>Dashboard</h1>
	<p>U bent ingelogd.</p>
	<a href="opdracht-cookies-login.php?logout=true">Uitloggen</a>
<?php endif ?>
</body>
</html>