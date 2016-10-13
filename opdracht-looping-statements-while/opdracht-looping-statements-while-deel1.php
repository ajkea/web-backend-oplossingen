<?php
$getallen = array();
$getallen2 = array();
$aantalGetallen = 100;
$getal = 0;

while ($getal < $aantalGetallen){
	$getallen[] = $getal;
	++$getal;	
}

	$reeks = implode(' , ', $getallen);

while ($getal < $aantalGetallen){
	if($getal % 3 == 0 && $getal >40 && $getal <80)
	{
		$getallen2[] = $getal;
	}
	++$getal;
}
		$reeks2 = implode(' , ', $getallen2);
?>
<html>
	<body>
	<?php echo $reeks ?>
	<br><?php echo $reeks2 ?>
	</body>
</html>