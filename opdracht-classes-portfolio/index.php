<?php

	require_once('classes/HTMLBuilder.php');

	$htmlPage = new HTMLBuilder("header.partial.php","body.partial.php","footer.partial.php");

	$htmlPage->buildHeader();
	$htmlPage->buildBody();
	$htmlPage->buildFooter();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht-classes-portfolio</title>
</head>
<body>
	
</body>
</html>