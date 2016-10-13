<?php
    $dag = 1;
    $dagen = array("","maandag","dinsdag","woensdag","donderdag","vrijdag","zaterdag","zondag");
    $vandaag;

    if ($dag == 1){
        $vandaag = $dagen[1];
    }
    if ($dag == 2){
        $vandaag = $dagen[2];
    }
    if ($dag == 3){
        $vandaag = $dagen[3];
    }
    if ($dag == 4){
        $vandaag = $dagen[4];
    }
    if ($dag == 5){
        $vandaag = $dagen[5];
    }
    if ($dag == 6){
        $vandaag = $dagen[6];
    }
    if ($dag == 7){
        $vandaag = $dagen[7];
    }
?>
<!doctype html>
<html>
<?php echo strtoupper($vandaag) ?>
</html>