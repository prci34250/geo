<?php
header("Access-Control-Allow-Origin: *");
require "config.php";

$lat = $_POST['lat'];
$lng = $_POST['lng'];

$newLat = $lat - 0.005;
$newLng = $lng + 0.005;

// $save = $document ;
$bdd = connectbase() ;

$query = 'SELECT * FROM geo_lieu limit 1'  ;
//echo '<H1>' .$query .'<H1>' ;

$liste = $bdd->query($query ) or die(print_r($bdd->errorInfo()));
$documents = array();

while ($document  = $liste->fetch() )
{
 $documents[] = $document ;
}


$data = [
	"status" => 200,
	"liste" => $documents,
	"param" => "$lat $lng",
	"lat" => $newLat,
	"lng" => $newLng,
];

echo(json_encode($data));
exit;