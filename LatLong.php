<?php 
include '/home/matthew/public_html/MattFun/MattMaps.class.php'; 

//silly JSON interface
$map = new MattMap();
echo $map->GetLatLongJSON();
?>