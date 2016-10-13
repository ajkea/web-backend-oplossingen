<?php
$dieren[] = "kat";
$dieren[] = "hond";
$dieren[] = "hamster";
$dieren[] = "cavia";
$dieren[] = "konijn";
$dieren[] = "degoe";
$dieren[] = "eekhoorn";
$dieren[] = "zebra";
$dieren = array("giraf","aap");

$voertuigen = array("landvoertuigen" => array("fiets","auto"),
				   "watervoertuigen" => array("boot"),
				   "luchtvoertuigen" => array("zeppelin","vliegtuig"));
?>
<html>
	<body>
	de voertuigen: <pre><?php var_dump($dieren) ?></pre>
		<br>
		<pre><?php var_dump($voertuigen) ?></pre>
	</body>
</html>