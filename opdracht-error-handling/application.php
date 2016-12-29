<?php

try{
	if (isset($_POST['submit'])){
		if (isset($_POST['code'])){

		}
	}
}
catch(Exception $e){
	echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Opdracht error handling</title>
</head>
<body>
<form action="application.php" method="POST">
	<p>Kortingscode</p>
	<input type="text" name="code">
	<input type="button" name="submit" value="verzenden">
</form>
</body>
</html>