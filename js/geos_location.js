
<script>
   function onMapClick(e) {
   	console.log(e) ;
    //alert( e.latlng.lat + ' ' + e.latlng.lng)
    lng = e.latlng.lng - 0.000
    lat = e.latlng.lat - 0.000
    query = lat + ' ' + lng;
    getAdressName(query, false); 
    // Afficher le nom de la localite
    console.log('on click' ) ; console.log (e) ; 
    //var lon  = e.latlng.lng.toFixed(5);
}

    function centrerCountry(){
    // Recuperer les coordonnees GPS
    // en fonction d'un adresse saisie
	
        query=document.getElementById('country').value	
        console.log(query) ;
        getAdressName(query, true);  



    }

    function searchCountry(){
    // Recuperer les coordonnees GPS
    // en fonction d'un adresse saisie
        lrech =  document.getElementById('country').value
        lvillage = document.getElementById('village').value
        if (lvillage=='')
         { alert ('Preciser la localite pour la recherche');
           return; }

        
        query=document.getElementById('country').value	 + ' , ' + lvillage
        console.log(query) ;
        getAdressName(query, true);  



    }

	function afficheMap()
	{
	//$('#localisation').html('<div class="spinner-border"></div>')
	map = L.map('map');

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 28,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map)

	map.on('locationfound', onLocationFound);
	map.on('locationerror', onLocationError);

	map.on('click', onMapClick);

    //console.log(map);
    //if (map.type=='locationfound') {alert(map.type);}
    map._zoom = 28;
	  map.locate({setView: true, maxZoom: 28, zoom:28});
    console.log(map);

 
	
	function onLocationFound(e) {
		var radius = e.accuracy / 2;
		//console.log(e) ; 
		//L.marker(e.latlng).addTo(map)
		//	.bindPopup("Vous êtes à  " + radius + " metres de ce point").openPopup();

		L.circle(e.latlng, radius /10 ).addTo(map);
		// Recherche de la localite correspondante
		query = e.latitude + ' ' + e.longitude
		getAdressName(query, false); 
		console.log('adresse')
		console.log(e)

		return e;
	}

	function onLocationError(e) {
		console.log(e) ; 
		alert('La géolocalisation est impossible - Veuillez saisir un lieu pour centrer la carte');
	}
	$('#localisation').html('<div class="text">localisation</div>')
	return 'toto' ;
}

// Fonctions localisation 
// a partir de l'adresse (retour recherche)	
function retourOk(response, marker){
  if (marker==false)
  {  
  $('#adress').html(response.results[0].formatted + ' ' + response.results[0].geometry.lat + ' ' + response.results[0].geometry.lng);
  	map.panTo(new L.LatLng(response.results[0].geometry.lat , response.results[0].geometry.lng), 28);}

  //$('#localite').html(response.results[0].components.village ;
  console.log(response.results[0].components.village)

  var village = response.results[0].components.village ;
  if (village === undefined) {village = response.results[0].components.city }

  console.log ('village=:' + village) ;
  if (village != undefined)
    {document.getElementById("village").value = village; }

  //var x=getElementById('localite')
  	//map.zoom = 18;
  console.log ('fct retour ok marker' + '=:' + marker);

 // ** Ajout des Markers suivant option
  if (marker==true)
		{L.marker([response.results[0].geometry.lat , response.results[0].geometry.lng]).addTo(map).bindPopup("<a href='../view/geo_inscrire_view.php'>Inscrire sur le site</a><br/>"  + response.results[0].formatted);}
	console.log ('rech adresse');
	//console.log (response);
    
  // Boucle sur les résultats
    iresultat=1;
	  response.results.forEach((resultat, index) => {
		console.log(resultat) //value
		if (resultat.components._type != 'city' && marker == true){	
			var xpop = 	'<a href="../php/geop_inscrire.php?loc=' + resultat.formatted  + '&lat=' + resultat.geometry.lat+ '&lng=' + resultat.geometry.lng +'" >Inscrire sur le site</a>' 
			var xpop = `
			<a href="../php/geop_inscrire.php?loc=${resultat.formatted}&lat=${resultat.geometry.lat}&lng= ${resultat.geometry.lng}">Inscrire sur le site</a>
			`
			console.log (xpop)
		    L.marker([resultat.geometry.lat , resultat.geometry.lng])
		    .addTo(map)
		    .bindPopup(xpop + '<br/>'  + resultat.formatted)
		    .on('click' , (e)=>{
		    	console.log(e)
          // Code Java pour preparer les reponses unitaires
          // et mettre à jour id =affichage

		    	// function qui va bien
		    	// Ajax
		    	// retour Ajax je window.location = ""
		    	console.error(e)
          iresultat = iresultat+ 1
		    });
       // Preparation de l'affichage a partir des résultats


		}

	})

	console.log(map.markers);
    // Resultat de la recherche (affichage)
    if (marker==true){
      response.results.forEach((resultat, index) => {
            // entête
            cdHTML= `<div id="titre` + index + `" data-toggle="collapse" data-target="#lieu` + index + `"><H8>` + resultat.formatted +
            '</H8></div>'
            const newElt = document.createElement("div");
            newElt.innerHTML = cdHTML ;
            document.body.appendChild(newElt);
            //
            // Requete Ajax Recherche info sur le lieu
            console.log('appel ajax ' + resultat.geometry.lat + ',' +resultat.geometry.lng )
           lieuAjax(resultat.geometry.lat,resultat.geometry.lng)
            // detail
// AJOUT D'UN TRUC

 // <!-- Parrtie à plier -->
  cdHTML2 = `
  <div id="lieu ${index} " class="collapse" style="background-color:pink"> <!-- Parrtie à plier -->
<form method="post" action="../php/geop_inscrire.php" >
<div id="cadre>" style="border-style: solid; border-width:3px;margin-top:3px;margin-left:3px;margin-right:3px;border-color:green">
  <div class="row">
    <div class=col-md-2> 
          <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="souvert" style="backgroundColor:red" disabled
          name='ouvert' checked onclick="couvert('souvert', 'louvert', 'Ouvert', 'Fermé')">
          <label class="custom-control-label" for="souvert" id='louvert' >Ouvert </label>
        </div>
     </div>     
    <div class=col-md-4> 
    <H4> <a href="#" data-toggle="tooltip" title="Saisir les informations générales">Info Générales</a></H4>
    </div>

  </div>
  <div id='lieu' class="row">

    <div class="input-group mb-3 col-md-6">
      <div class="input-group-prepend">
        <span class="input-group-text" id="tadr">Lieu</span>
      </div>
      <textarea id="ladr" type="text" row=2 class="form-control" placeholder="Idendification du lieu" disabled onclick="isSaisie('ladr', 'tadr', true)">La Boite à Fromages, Rue Saint-Pierre, 34250 Palavas-les-Flots, France</textarea>
    </div>
    <div class="input-group mb-3 col-md-6">
      <div class="input-group-prepend">
        <span class="input-group-text" id='lcovid'>
          <a href="#" data-toggle="tooltip" title="Saisir les informations liées au COVID 19" style="color:white">Corona</a></span>
      </div>
      <textarea id='tcovid' type="text" name="covid" row=2 class="form-control" 
      onchange="isSaisie('tcovid', 'lcovid', true)" placeholder="Informations spécifiques liés au COVID-19">Un personne à la fois</textarea>
    </div>
  </div> <!-- fin linge -->
  <div class="row">
    <div class="input-group mb-3 col-md-6">
      <div class="input-group-prepend">
        <span class="input-group-text" id='lact'><a href="#" data-toggle="tooltip" title="Préciser l'activité, saisir les mots clés utiles pour les recherches" style="color:white">Activité</a></span>
      </div>
      <textarea id='tact' type="text" name="activite" row=2 class="form-control" placeholder="Informations générales , mot clé de recherche" 
      onchange="isSaisie('tact', 'lact', true)">Vente de fromages,  Saucisson , Vin de producteur Produits locaux</textarea>
    </div>
    <div class="input-group mb-3 col-md-6">
      <div class="input-group-prepend">
        <span class="input-group-text" id='lhoraires' >Horaires</span>
      </div>
      <textarea id='thoraires' type="text" name="horaires" row=2 class="form-control" 
      onchange="isSaisie('thoraires', 'lhoraires', true) "placeholder="Horaires">Tous les jours de 9h à 18h</textarea>
    </div>
  

  </div> <!-- fin linge -->

    <!-- Latitude et Lognitudes --> 
    <div id='latlng' class="row" >
       <div class="input-group mb-3 col-md-6">
          <div class="input-group-prepend">
            <span class="input-group-text">Latitude</span>
          </div>
          <input type="text" name="latitude" value="43.5282570" disabled></input>
      </div> 
      <div class="input-group mb-3 col-md-6">
          <div class="input-group-prepend">
            <span class="input-group-text">Longitude</span>
          </div>
          <input type="text" name="longitude" value="3.9317903" disabled></input>
      </div> 
    </div>
</div>


<div id="cadre>" style="border-style: solid; border-width:3px;margin-top:3px;margin-left:3px;margin-right:3px;border-color:darkmagenta;background-color:lavender">
  <div class="row">
    <div class=col-md-2> 
          <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="scommande" 
          name='commande'  onclick="couvert('scommande', 'lcommande','Suivant Modalités', 'Sur place')">
          <label class="custom-control-label" for="scommande" id='lcommande'>Sur Place</label>
        </div>
     </div>

     <div class=col-md-5>
      <H4>Possibilités Commandes</H4>
    </div>

  </div> 
  <div id='lieu' class="row">

     <div class="input-group mb-3 col-md-6">
        <div class="input-group-prepend">
          <span class="input-group-text">Modalités</span>
        </div>
        <textarea type="text" name="cde_modalites" row=2 class="form-control" placeholder="Préciser si les modalités pour les commandes"></textarea>
     </div>
        <div class="col-md-6" style="margin-left:0px">
      <div class="row" >

        <div class="col-sm-3">
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="cde_cktel" id="ck_tel" 
            checked onclick="affiche('ck_tel' , 'tel')">Tel<i class="fas fa-phone"> </i>
          </label>
        </div>  
      </div>
      <div class="col-sm-8" >
        <input type="text" id="tel" name="cde_notel" class="form-control" 
         placeholder="Tel" value="0603013486" ></input>
      </div>  
    </div>  
    <div class="row">
        <div class="col-sm-3">
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox"  name="cde_ckmail"  id='ck_mail' class="form-check-input"  onclick="affiche('ck_mail' , 'mail')">mail
          </label>
        </div>  
      </div>
      <div class="col-sm-4">
        <input type="text"  class="form-control" name="cde_mail" id="mail" style="visibility:hidden" value=""placeholder="Mail" ></input>
      </div>  
    </div>
    <div class="row"> 
        <div class="col-md-3">
        <div class="form-check">  
          <label class="form-check-label">
            <input type="checkbox"  name="cde_ckurl"  id='ck_website' class="form-check-input"  onclick="affiche('ck_website' , 'website')">Internet
          </label>
        </div>  
      </div>
      <div class="col-md-8" id="dwebsite" >
        <input type="text" name="cde_url" id="website" style="visibility:hidden"  value=""  class="form-control" placeholder="adresse du site"></input>
      </div>
    </div>



    </div> <!-- fin linge -->

  </div>    <!-- Fin cadre -->

    <!-- Cadre pour les Commndes et Livraison -->

  <div id='dliv' class="row">   
    <div class=col-md-2> 
          <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="slivraison" 
          name='livraison'  
          onclick="couvert('slivraison', 'llivraison','Suivant Modalités', 'Sur place')">
          <label class="custom-control-label" for="slivraison" id='llivraison'>Sur Place</label>
        </div>
     </div> 
     <div class=col-md-5>   
      <H4>Possibilités Livraison</H4>
    </div>
  </div>

  <div class=row> 
     <div class="input-group mb-3 col-md-6">
        <div class="input-group-prepend">
          <span class="input-group-text">Modalités</span>
        </div>
   
      
        <textarea type="text" row=2 class="form-control"  placeholder="Préciser les modalités de livraison" 
        name="liv_modalites" ></textarea>
          
     </div>

     <div class="input-group mb-3 col-md-6">
        <div class="input-group-prepend">
          <span class="input-group-text" id="ldelai">Delai</span>
        </div>

      
        <textarea type="text" name='liv_delais' id='tdelai' row=2 class="form-control"  placeholder="Indiquer le délai estimé pour les livraisons" 
        ></textarea>
          
     </div>
  </div> <!-- fin ligne-->

  </div>    <!-- Fin cadre -->

    <button type="submit" style="margin-top:3px" name="btn_inscrire" id="btn_inscrire" type="button" class="btn btn-primary btn-block">Enregistrer les infos </button>
</form>  
</div> <!-- Parrtie à plier -->  `
            const newElt2 = document.createElement("div");
            newElt.innerHTML = cdHTML + cdHTML2 ;
            document.body.appendChild(newElt2);
            //console.log (cdHTML + cdHTML2)
      }) ; // Fin de la boucle
     } // fin if sur affichage


}

function retourKo(response){
  alert("Aucun résultat !")
}

function getAdressName(query, marker){
  
 // Marker = true => Marquer le lieu sinon seulement centrer
  if (marker == true)
  {
  //$('#adress').html('<div class="spinner-border"></div>')
}
  
  $.ajax({
        url: 'https://api.opencagedata.com/geocode/v1/json',
        method: 'GET',
        data: {
          'key': '4c93ad1799da497a90337834ebb9c067',
          'q': query,
          'no_annotations': 1
          // see other optional params:
          // https://opencagedata.com/api#forward-opt
        },
        dataType: 'json',
        statusCode: {
          200: function(response){  // success
            //maFonctionReponse(response)
            console.log('getadress' + response.results[0].formatted + ' mark=' + marker);
            // maj localite quand pas de marker 
            // soit init soit clic pour centrer
            
            if(response.total_results === 0){
              retourKo(response,marker)
            }else{

              retourOk(response,marker)
            }


          },
          402: function(){
            console.log('hit free-trial daily limit');
            console.log('become a customer: https://opencagedata.com/pricing');
          }
          // other possible response codes:
          // https://opencagedata.com/api#codes
        }
      });
  

  
}
function lieuAjax(lat,lng){
  
 // Recherche d'un lieu avec ses coordonnees

  console.log('entree ajax')
  //url: '../bdd/geob_lieuAjax.php',
  $.ajax({
        url: '../bdd/geob_lieuAjax.php',
        method: 'GET',
        data: {
          'lat': lat,
          'lng': lng
          // see other optional params:
          // https://opencagedata.com/api#forward-opt
        },
        dataType: 'json',
        statusCode: {
          200: function(data){  // success
            //maFonctionReponse(response)
            console.log('lieuAjax') ; console.log (data );
            //alert('retour ajax' + data.status);
            // maj localite quand pas de marker 
            // soit init soit clic pour centrer


          },
          400: function(){
            console.log('hit free-trial daily limit');
            console.log('become a customer: https://opencagedata.com/pricing');
          }
          // other possible response codes:
          // https://opencagedata.com/api#codes
        }
      });
  

  
}  

</script>
