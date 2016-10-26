<?php
// 22u 35m 25sec 21 januari 1904
$datumStr = mktime(22,35,10,22,01,1904);
$datum	=	date('d F Y, g:i:s A', $datumStr);
?>
<html>
	<head>
	</head>
	<body>
		<?= $datum ?>
	</body>
</html>