<?php

$dagNr = 3;

switch ($dagNr){
	case '1':
		$dag = 'maandag';
		break;
	case '2':
		$dag = 'dinsdag';
		break;
	case '3':
		$dag = 'woensdag';
		break;
	case '4':
		$dag = 'donderdag';
		break;
	case '5':
		$dag = 'vrijdag';
		break;
	case '6':
		$dag = 'zaterdag';
		break;
	case '7':
		$dag = 'zondag';
		break;
	default:
		$dag = 'geen idee';
}
$dag = strtolower($dag);

?>
<html>
	<body>
		het is dag <?php echo $dagNr ?> van de week en dat is een <?php echo $dag ?>
	</body>
</html>