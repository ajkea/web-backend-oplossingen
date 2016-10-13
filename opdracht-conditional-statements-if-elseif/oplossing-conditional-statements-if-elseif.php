<?php
$getal = 45;
$laagste;
$hoogste;
$fout = false;

if($getal > 0 && $getal < 10)
{
	$laagste = 0;
	$hoogste = 10;
}
elseif($getal >= 10 && $getal < 20)
{
	$laagste = 10;
	$hoogste = 20;
}
elseif($getal >= 20 && $getal < 30)
{
	$laagste = 20;
	$hoogste = 30;
}
elseif($getal >= 30 && $getal < 40)
{
	$laagste = 30;
	$hoogste = 40;
}
elseif($getal >= 40 && $getal < 50)
{
	$laagste = 40;
	$hoogste = 50;
}
elseif($getal >= 50 && $getal < 60)
{
	$laagste = 50;
	$hoogste = 60;
}
elseif($getal >= 60 && $getal < 70)
{
	$laagste = 60;
	$hoogste = 70;
}
elseif($getal >= 70 && $getal < 80)
{
	$laagste = 70;
	$hoogste = 80;
}
elseif($getal >= 80 && $getal < 90)
{
	$laagste = 80;
	$hoogste = 90;
}
elseif($getal >= 90 && $getal < 100)
{
	$laagste = 90;
	$hoogste = 100;
}
else
{
	$fout = true;
}

if(!$fout)
{
	$tekst = "het ingevoerde getal " . $getal . " ligt tussen " . $hoogste . " en " . $laagste;
}
else
{
	$tekst = "Het getal ligt niet tussen 0 en 100";
}

$reverseTekst = strrev($tekst);
?>
<html>
<body>
	<?php echo $reverseTekst ?>
</body>
</html>