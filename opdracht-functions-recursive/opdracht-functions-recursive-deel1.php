<?php
$geld = 100000;
$rente = .08;
$aantalJaar = 10;

function berekenKapitaal($geld,$rente,$aantalJaar){
	static $teller = 1;
	static $kapitaalJaren = array();
	
	if($teller <= $aantalJaar){
	$renteBedrag = $geld * $rente;
	$nieuwGeld = floor($renteBedrag + $geld);
	$kapitaalJaren[$teller] = "Na " . $teller . " jaar bedraagt het kapitaal: " . floor($nieuwGeld) . " de rente bedraagt: " . floor($renteBedrag);
		
	++$teller;
		
	return berekenKapitaal($nieuwGeld,$rente,$aantalJaar);
	}
	else{
		return $kapitaalJaren;
	}
}
 $winstHans = berekenKapitaal($geld,$rente,$aantalJaar);
?>
<html>
	<body>
					<?php foreach($winstHans as $value): ?>
				<li><?php echo $value ?></li>
			<?php endforeach ?>
	</body>
</html>