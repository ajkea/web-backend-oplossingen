<?php

	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
	$functie1 = '2';
	$functie2 = '8';
	$functie3 = 'a';

function telKarakters($string){
	$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';
	$aantalKarakters = strlen($md5HashKey);
	$aantalKeer = substr_count($md5HashKey,$string);
	$procentueel = ($aantalKeer / $aantalKarakters) * 100;
	
	return $procentueel;
}

?>
<html>
	<body>
		functie 1: de needle '<?php echo $functie1 ?>' komt 
		<?php 
		echo telkarakters($functie1) ?>% keer voor in de hash key <?php echo $md5HashKey ?><br>		functie 2: de needle '<?php echo $functie1 ?>' komt 
		<?php 
		echo telkarakters($functie3) ?>% keer voor in de hash key <?php echo $md5HashKey ?><br>		functie 3: de needle '<?php echo $functie1 ?>' komt 
		<?php 
		echo telkarakters($functie3) ?>% keer voor in de hash key <?php echo $md5HashKey ?><br>
		
	</body>
</html>