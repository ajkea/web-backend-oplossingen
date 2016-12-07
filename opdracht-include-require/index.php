<?php


	$artikels =	array(
					array(	'title'	=> 'Title article 1',
							'body' 	=> 'Body article 1',
							'tags' 	=> 'Keywords article 1',
					),
					array(	'title'	=> 'Title article 2',
							'body' 	=> 'Body article 2',
							'tags' 	=> 'Keywords article 2',
					),
					array(	'title'	=> 'Title artikel 3',
							'body' 	=> 'Body artikel 3',
							'tags' 	=> 'Keywords article 3',
					)
				);

	if ( isset( $_GET[ 'article' ] ) )
	{
		$article	=	$artikels[ $_GET[ 'article' ] ];
	}


	include 'view/header-partial.html';
	if ( !isset( $_GET[ 'article' ] ) )
	{
		include 'view/artikels-partial.html';
	}
	else
	{
		include 'view/body-partial.html';
	}
	include 'view/footer-partial.html';
?>