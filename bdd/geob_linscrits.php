<HTML>


<?php
include '../php/config.php' ;
/*********************************
**   Liste des insctits         **
*********************************/

// SQL entre deux points
// select st_distance_sphere( POINT( 43.5336029,3.9375172), POINT(43.528257,3.9317903))

$lat= 43.527444  ;
$lng = 3.930413 ;
$distance = 5000 ;
$listes = inscrits($lat, $lng, 'pizza', $distance) ;
exit ;

function inscrits($lat, $lng, $rech, $distance)
{
  $bdd= connectbase() ;
  // Ordre SQL
  $sql = 'SELECT * , 
  st_distance_sphere (POINT( latitude, longitude), POINT(' . $lat  . ' ,' . $lng .')) as distance 
  FROM geo_lieu ' . '  WHERE (adresse like "%' . $rech . '%" or activite like "%' . $rech . '%") '  
  . ' and st_distance_sphere( POINT( latitude, longitude), POINT('  . $lat . ' ,' . $lng .' )) <= ' . $distance . ' order by distance desc' ;
  echo $sql ;
  $results = $bdd->query($sql) or die(print_r($bdd->errorInfo()));
  var_dump($results) ;
  $liste = array();
  while ($lieulu = $results->fetch())

		{
	     echo '<br> ' . $lieulu['adresse'] . ' ' . $lieulu['distance'] ;
		 $liste[]= $lieulu ;       
		}
	$results->closecursor() ;	
  var_dump($liste)	;
}
?>