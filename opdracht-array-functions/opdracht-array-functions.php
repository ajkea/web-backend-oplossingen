<?php
$dieren = array("aap","kat","hond","hamster","giraf","olifant");
$aantalDieren = count($dieren);
$zoekTerm = "retw";
$gevonden = array_search($zoekTerm,$dieren);


?>
<html>
	<body>
		<pre><?php var_dump($dieren) ?></pre>
	het aantal dieren in de array: <?php echo $aantalDieren ?>
		<?php if($gevonden){
	echo "er is een dier gevonden met zoekterm " . $zoekTerm;
}
	else{
		echo "er is geen dier gevonden met zoekterm " . $zoekTerm;
	} ?>

		
	</body>
</html>