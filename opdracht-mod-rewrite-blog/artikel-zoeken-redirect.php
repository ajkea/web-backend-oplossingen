<?php 
if (isset($_GET["zoeken"])) 
{
	if ($_GET["zoeken"]=="") 
	{
	header("Location: artikels/"); /* Redirect browser */
	exit();
	}
	$url="zoeken/content/".$_GET["zoeken"]."/";
	header("Location:".$url); /* Redirect browser */
	exit();
} 
if (isset($_GET["jaartal"])) 
{
	if ($_GET["jaartal"]=="") 
	{
	header("Location: artikels/"); /* Redirect browser */
	exit();
	}
	$url="zoeken/datum/".$_GET["jaartal"]."/";
	header("Location:".$url); /* Redirect browser */
	exit();
} 
?>