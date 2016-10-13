<?php

function berekenSom($getal1,$getal2){
	$som = $getal1 + $getal2;
	return $som;
}

function vermenigvuldig($getal1,$getal2){
	$totaal = $getal1 * $getal2;
	return $totaal;
}

function isEven($getal)
{
	if($getal % 2 == 0){
		return false;
	}
	return true;
}

	$som 		=	berekenSom( 4, 5 );
	$product 	= 	vermenigvuldig( 4, 5 );

	$getalEvenOneven 	=	11;
	$evenOneven 		=	isEven( $getalEvenOneven );

	function upperString( $string ) 
	{
		$resultaatArray['uppercase']	=	strtoupper( $string );
		$resultaatArray['length']		=	strlen( $string );

		return $resultaatArray;
	}
	$string 			=	'Joepie oefeningen maken';
	$stringResultaat 	=	upperString( $string );
?>
<html>
<body>
	<p>De som van 4 en 5 is gelijk aan <?php echo $som?></p>
		<p>Het product van 4 en 5 is gelijk aan <?php echo $product?></p>

		<?php if ( $evenOneven ): ?>

			<p>Het getal <?php echo $getalEvenOneven ?> is even</p>
		<?php else: ?>

			<p>het getal <?php echo $getalEvenOneven ?> is oneven</p>
		<?php endif ?>

			<?php foreach( $stringResultaat as $key => $value ): ?>
			<li><?php echo $key ?>: <?php echo $value ?></li>
		<?php endforeach ?>
	</body>
</html>