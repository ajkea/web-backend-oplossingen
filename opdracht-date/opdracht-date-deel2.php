<?php
// 22u 35m 25sec 21 januari 1904
setlocale(LC_ALL, 'nld_nld');
$datumStr = mktime(22,35,25,01,21,1904);
$datum	=	strftime('%d %B %Y, %H:%M:%S %p', $datumStr);
?>
<html>
	<head>
	</head>
	<body>
		<?= $datum ?>
	</body>
</html>