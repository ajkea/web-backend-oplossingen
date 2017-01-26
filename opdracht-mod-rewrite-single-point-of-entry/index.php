<?php
    function autoloader() 
    {
        require_once("classes/bieren.php");
    }
    spl_autoload_register("autoloader");
    $gets = $_GET;
    if(isset($_GET["controller"]))
    {
   		$bieren = ucfirst($_GET["controller"]);
    }
    $bier = new Bieren();
    
    if(isset($_GET["method"]))
    {
    	$method = $_GET["method"];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

    <div>
        <h1>Index.php</h1>
        <div class="urls">
            <?php foreach ($gets as $key => $value) : ?>
                <p>[<?= $key ?>] => <?= $value; ?></p>
            <?php endforeach; ?>
        </div>
        <h2><?php if(isset($_GET["method"])){ echo $bier->$method(); } ?></h2>
    </div>

</body>
</html>