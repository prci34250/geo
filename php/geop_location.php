
<html>
<head>
	
	<title>Geoloc Essai</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
	<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		#map {
			width: 600px;
			height: 400px;
		}
	</style>

	<style>body { padding: 0; margin: 0; } #map { height: 100px; width:100vw; }</style>
</head>
<body>


<div class="form-row" style="margin-left:3px">	

	<div class="col-xs-3">
		<input type="text" id="country" class="form-control" placeholder="Nom lieu cherché"></input>
	</div>
	<div class="col-xs-3"  >
		<input type="text" id="village" class="form-control"  placeholder="Localite , Dept ou région"></input>
	</div>
		<div class="row">
	<div class="col-6">
	<button class="btn btn-primary" id="bt_locate" name="bt_locate" onclick="searchCountry()">Chercher</button></div>

</div>
	  <div id="result"></div>
      
      <div id="localite"></div>
      <div id="adress" ></div>
</div>
</div>
 <div class="row">
    <div class="col-xl-12">
      <div  id="map" style="width: 100vw; height: 500px"></div>
    </div>
 </div>   
   <div class="row">	 
     <div class="col-xl-6" >
	   
	      <H2> Resultats de la recherche </H2>
	  </div> 
	</div>  

 <div id='affichage'> <!-- debut affichage -->

 </div>  <!-- Fin affichage  -->   


<?php 
require ('../js/geos_location.js');

?>
<script>
$( document ).ready(afficheMap()) ;
</script>



</body>
</html>
