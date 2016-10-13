<?php
	$tellerArray = array();

	foreach($characterSortedReversed as $value)
	{
		if ( isset ( $tellerArray[ $value ] ) )
		{
			++$tellerArray[ $value ];
		}
		else
		{
			$tellerArray[ $value ] = 1;
		}
		
	}
	
?>