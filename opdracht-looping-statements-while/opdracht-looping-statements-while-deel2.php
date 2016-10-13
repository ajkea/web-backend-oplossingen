<?php
	$boodschappenlijstje	=	array( "boter",
										"kaas",
										"eieren");
?>
<html>
	<body>
		<ul>
		<?php 
		$aantal=0;
		while( isset( $boodschappenlijstje[$aantal])): ?>
		<li><?= $boodschappenlijstje[$aantal] ?></li>
		<?php $aantal++ ?>
			<?php endwhile?>
	</ul>
	</body>
</html>