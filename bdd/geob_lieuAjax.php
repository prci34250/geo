<?php
header("Access-Control-Allow-Origin: *");
require "../php/config.php";

if  (isset($_POST['lat']))
	{$lat = $_POST['lat'];} else $lat = $_GET['lat'];
//$lat = $_POST['lat'];
if  (isset($_POST['lng']))
	{$lng = $_POST['lng'];} else $lng = $_GET['lng'];
//$lng = $_POST['lng'];


// $save = $document ;
$bdd = connectbase() ;

$query = 'SELECT * FROM geo_lieu WHERE latitude = ' .$lat .' AND longitude = ' .$lng ;
//echo '<H1>' .$query .'<H1>' ;

$result = $bdd->query($query ) or die(print_r($bdd->errorInfo()));
$lieu = array();

if ($result->rowcount() == 0)
{
 $data = array(
  "status" => 400,
  "lieu" => "Pas d'info"
 );	
}
else
{
 $lieu = $result->fetch() ;

$data = array(
	"status" => 200,
	"adresse" => $lieu['adresse'],
	"lieu" => $lieu,

);
}
//var_dump($lieu);
echo(json_encode($data));
exit;