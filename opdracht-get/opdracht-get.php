<?php
//tonen artikel compleet?

	$artikels =  array(
				array('id' => 0, 'titel' => 'McDonald\'s houdt mascotte binnen door horrorclowns',
			   'datum' => '13/10/2016',
			   'inhoud' => 'Ronald McDonald, de mascotte van fastfoodketen McDonald’s, zal in Amerika een tijdje uit de publiciteit van de hamburgerfilialen verdwijnen. Die beslissing neemt McDonald’s na de onrust in de VS over de zogenaamde ‘killerclowns’.',
			   'afbeelding' => 'img/artikel1.jpg',
			   'alt' => 'die clowns van mc donalds'),
			  
			    array('id' => 1, 'titel' => 'Sarah Vandeursen showt tattoo van zwaaiende Paul D\'Hoore',
				'datum' => '13/10/2016',
				'inhoud' => 'In het Vier-programma De Idioten bracht Jelle De Beule, begenadigd tekenaar, een tattoo van de financieel journalist aan. Cartoonist Jeroom maakte het ontwerp. De tattoo toont Paul D’Hoore die achter een struik staat te zwaaien. Vandeursen wil nu op haar andere heup een tattoo van Jean Bosco Safari of Coco Junior.',
				'afbeelding' => 'img/artikel2.jpg',
				'alt' => 'tattoo plaatsen'),
			  
			  array('id' => 2, 'titel' => '12-jarige die beroemd wil worden begaat dure vergissing ',
				'datum' => '13/10/2016',
				'inhoud' => 'De 12-jarige Jose Javier heeft een rekening gekregen van 100.000 euro van Google. De Spaanse jongen had de kosten opgestapeld door per ongeluk advertenties te kopen om zijn brassband bekend te maken. Google gaat nu de kosten annuleren.',
				'afbeelding' => 'img/artikel3.jpg',
				'alt' => 'afbeelding google adwords'));

$displayTekst = '';
$artikelApart = false;

if(isset($_GET['id'])){
	$individueelArtikelId = $_GET['id'];
	$artikelApart = true;
}
?>
<html>
	<head>
<style>
	body
		{
			align-content: center;
			font-family: arial;
		}
	
	.artikel{
			float:left;
			width:288px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:lightgrey;
	}
</style>
	</head>
	<body>
		<div class="artikels">
		<?php foreach ($artikels as $id => $artikel): ?>
			<div class="artikel">
		<h2><?php echo $artikel['titel'] ?></h2>
			<p><?php echo $artikel['datum'] ?></p>
			<img src="<?php echo $artikel['afbeelding'] ?>"  alt="<?php echo $artikel['alt'] ?>"></img>
		<p><?php echo (substr($artikel['inhoud'],0,50) . '...') ?> </p>
			<a href="opdracht-get.php?id=<?php echo $id ?>">Lees meer</a>
			
			</div>
		<?php endforeach ?>
		
		<?php if($artikelApart): ?>
		<?php echo $artikels[$individueelArtikelId]['titel'] ?>
		<?php endif ?>
		</div>
	</body>
</html>