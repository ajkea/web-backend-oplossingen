<?php

	require_once 'classes/Animals.php';
	require_once 'classes/Lion.php';
	require_once 'classes/Zebra.php';

$zebra = new Animals('Ludo','male',100);
$leeuw = new Animals('Hugo','male',150);
$olifant = new Animals('Dumbo','male',200);

$simba = new Lion("Simba","male",80,"Leeuwenkoning leeuw");
$baller = new Lion("Baller","male",180,"rijkste leeuw in de wereld");

$zebra1 = new Zebra("Spirit","female",70,"Quagga");
$zebra2 = new Zebra("Zebrapad","male",90,"Selous");

$zebra->changeHealth(-20);
$olifant->changeHealth(100);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Oefening opdracht classes extends</title>
</head>
<body>
<p><?php echo $zebra->getName() ?> is van het geslacht <?php echo $zebra->getGender() ?> en heeft momenteel <?php echo $zebra->getHealth() ?> levenspunten (special move: <?php echo $zebra->doSpecialMove() ?>).</p>

<p><?php echo $leeuw->getName() ?> is van het geslacht <?php echo $leeuw->getGender() ?> en heeft momenteel <?php echo $leeuw->getHealth() ?> levenspunten (special move: <?php echo $zebra->doSpecialMove() ?>).</p>

<p><?php echo $olifant->getName() ?> is van het geslacht <?php echo $olifant->getGender() ?> en heeft momenteel <?php echo $olifant->getHealth() ?> levenspunten (special move: <?php echo $zebra->doSpecialMove() ?>).</p>

<p>De speciale move van <?php echo $simba->getName() ?> (soort: <?php echo $simba->getSpecies() ?>): <?php echo $simba->doSpecialMove() ?></p>

<p>De speciale move van <?php echo $baller->getName() ?> (soort: <?php echo $baller->getSpecies() ?>): <?php echo $baller->doSpecialMove() ?></p>

<p>De speciale move van <?php echo $zebra1->getName() ?> (soort: <?php echo $zebra1->getSpecies() ?>): <?php echo $zebra1->doSpecialMove() ?></p>

<p>De speciale move van <?php echo $zebra2->getName() ?> (soort: <?php echo $zebra2->getSpecies() ?>): <?php echo $zebra2->doSpecialMove() ?></p>


</body>
</html>