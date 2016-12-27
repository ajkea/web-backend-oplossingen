<?php

$nummer = 0;
$artikels = array(
	array(
		'titel' => "Man slaat paard",
		'tekst' => "Een man heeft gisteren een paard geslagen in oelegem. Het paard had ervoor al in de man zijn hand gebeten waarop hij reageerde en het paard met de vlakke hand sloeg.",
		'tags' => "paard","konijn"),
	array(
		'titel' => "Paard bijt man",
		'tekst' => "Een paard heeft gisteren een man gebeten in Oelegem. De man had ervoor al in het paard zijn gezicht geslagen waarop het paard reageerde en de man beet.",
		'tags' => "geweld"),
	array(
		'titel' => "Een ander artikel",
		'tekst' => "Een artikel dat over niets gaat, het dient enkel ter opvulling omdat ik momenteel geen internet heb en dus niets kan opzoeken.",
		'tags' => "tekst"));
	
	if ( isset( $_GET[ 'artikels' ] ) )
	{
		$artikel	=	$artikels[ $_GET[ 'artikel' ] ];
	}


include "view/header-partial.html";
include "view/body-partial.html";

include 'view/artikel-partial.html';
include "view/footer-partial.html";

?>