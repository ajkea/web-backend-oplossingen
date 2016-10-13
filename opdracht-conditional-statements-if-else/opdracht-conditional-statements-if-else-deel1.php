<?php
	$year = 2000;
	$schrikkeljaarJaNee	= false;

if ((($year % 4 ==0) && ($year % 100 != 0)) || ($year % 400 == 0))
{
	$schrikkeljaarjanee = true;
}
?>
<!doctype html>
<html>
	<?php echo $year ?> is <?php echo ($schrikkeljaarJaNee ) ? "een" : "geen" ?> schrikkeljaar
</html>