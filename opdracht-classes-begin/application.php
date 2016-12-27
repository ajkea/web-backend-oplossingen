<?php
	include 'classes/Percent.php';

$getal1 = 50;
$getal2 = 100;
$percent = new Percent($getal1,$getal2);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	table{
		border-style: solid;
	}
	td{
		border-style: solid;
	}
	</style>
</head>
<body>
<?php echo "het eerste getal is: " . $getal1 . " en het 2de getal is: " . $getal2 ?>
<table>
<tr><td>absolute waarde</td>
<td>
<?php echo $percent->absolute ?>
</td>
<tr>
<td>relative waarde</td>
<td>
<?php echo $percent->relative ?>
</td>
</tr>
<tr>
<td>percentage</td>
<td>
<?php echo $percent->hundred ?>
</td>
</tr>
<tr>
<td>Nominale waarde</td>
<td>
<?php echo $percent->nominal ?>
</td>
</tr>
</table>
</body>
</html>