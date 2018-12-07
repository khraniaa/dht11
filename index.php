<?php
$filename = "data.json" ;
$data_json = file_get_contents($filename) ;
$data = json_decode($data_json) ;
$date_update = filemtime($filename);

$bargraph_height = 161 + $data->temperature * 4;
$bargraph_top = 315 - $data->temperature * 4;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5">
    <title>DTH11 NodeMcu</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<h1>Température</h1>

<p>
    Il fait <?php echo $data->temperature ; ?>°C avec <?php echo $data->humidite ; ?>% d'humidité.</br>
    Le <?php echo date("d/m/Y", $date_update) ; ?>
    à <?php echo date("H:i:s", $date_update) ; ?>.
</p>

<div id="thermometer">
    <div id="bargraph" style="height: <?php echo $bargraph_height ; ?>px; top: <?php echo $bargraph_top ; ?>px;"></div>
</div>

</body>
</html>
