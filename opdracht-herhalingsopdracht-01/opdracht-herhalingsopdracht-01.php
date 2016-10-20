<?php
$iframeZichtbaar = False;
$voorbeeldenBool = False;
$opdrachtenBool = False;
$zoekenBool = False;

$path = realpath('..\..');

if(isset($_GET['link']))
	switch ($_GET['link']){
		case 'cursus':
			$iframeZichtbaar = True;
			break;
		case 'voorbeelden':
			$map = realpath('../');
			$voorbeeldenArray = showList($map);
			$voorbeeldenBool = true;
			break;
		case 'opdrachten':	
			$map = realpath('../');
			$opdrachtenArray = ShowList($map);
			break;
	}

if(isset($_GET['zoeken']))
{
	$zoekenBool = True;
	$zoekterm = $_GET['zoekterm'];
	
}

function showList($bestandenPath){
	foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($bestandenPath)) as $filename)
{
        $array = "$filename\n";
		return $array;
}
}


?>
<html>
	<head>
		<style>
			iframe{
				height: 750px;
				width: 1000px;
			}
		</style>
	</head>
	<body>
		<h1>Indexpagina</h1>
		<ul>
		<li><a href="opdracht-herhalingsopdracht-01.php?link=cursus">Cursus</a></li>
		<li><a href="opdracht-herhalingsopdracht-01.php?link=voorbeelden">Voorbeelden</a></li>
		<li><a href="opdracht-herhalingsopdracht-01.php?link=opdrachten">Opdrachten</a></li>
		</ul>
		
		<form action='opdracht-herhalingsopdracht-01.php' method="GET">
		<label id="intro">Zoeken naar: </label>
			<input type='text' name='zoekterm'>
			<input type=submit name='zoeken' value="Submit Query">
		</form>
		<h1>Inhoud</h1>
		
		<?php if($iframeZichtbaar): ?>
			<iframe = src='web-backend-cursus.pdf'></iframe>
		<?php endif ?>
		
		<?php if($voorbeeldenBool || $opdrachtenBool): ?>
		<?php echo $voorbeeldenArray ?>
		<?php endif ?>
	</body>
</html>