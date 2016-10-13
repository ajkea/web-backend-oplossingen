<?php
	$aantalSeconden = 200000000; //200 000 000
	$minuut = 60;
	$uur = 60 * $minuut;
	$dag = 24 * $uur;
	$week = 7 * $dag;
	$maand = 31 * $dag;
	$jaar = 365 * $dag;

	$aantalMinuut = floor($aantalSeconden / $minuut);
	$aantalUur = floor($aantalSeconden / $uur);
	$aantalDag = floor($aantalSeconden / $dag);
	$aantalWeek = floor($aantalSeconden / $week);
	$aantalMaand = floor($aantalSeconden / $maand);
	$aantalJaar = floor($aantalSeconden / $jaar);


?>
<!doctype html>
<html>
	het aantal seconden: <?php echo $aantalSeconden ?>
	<p>het aantal minuten: <?php echo $aantalMinuut ?></p>
	<p>het aantal uren: <?php echo $aantalUur ?></p>
	<p>het aantal dagen: <?php echo $aantalDag ?></p>
	<p>het aantal weken: <?php echo $aantalWeek ?></p>
	<p>het aantal maanden: <?php echo $aantalMaand ?></p>
	<p>het aantal jaren: <?php echo $aantalJaar ?></p>
</html>