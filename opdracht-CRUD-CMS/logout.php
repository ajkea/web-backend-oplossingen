<?php
session_start();

	$_SESSION['notification'] = 'U bent uitgelogd. Tot de volgende keer.';
	setcookie(login,'',time() - 3600);
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'login-form.php';
	header("Location: http://$host$uri/$extra");
	exit;

?>