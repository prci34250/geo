<!DOCTYPE html>
<html>
<head>
	
	<title>Geo Inscrire</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
	<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

<style>
.switch label input[type=checkbox]:checked {
            background-color: red;
        }
</style>  
</head>
<body>
<H1> Inscription lieu sur cpres.fr </H1>


<form method="post" action="../php/geop_inscrire.php" >
<div id="cadre>" style="border-style: solid; border-width:3px;margin-top:3px;margin-left:3px;margin-right:3px;border-color:green">
	<div class="row">
		<div class=col-md-2> 
		      <div class="custom-control custom-switch">
			    <input type="checkbox" class="custom-control-input" id="souvert" style="backgroundColor:red"
			    name='ouvert' <?php if($lieu->_ouvert==true) {echo 'checked';} ?> onclick="couvert('souvert', 'louvert', 'Ouvert', 'Fermé')">
			    <label class="custom-control-label" for="souvert" id='louvert' ><?php if($lieu->_ouvert==true) {echo 'Ouvert';} else {echo 'Fermé';}  ?> </label>
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
	    <textarea id="ladr" type="text" row=2 class="form-control" placeholder="Idendification du lieu" onclick="isSaisie('ladr', 'tadr', true)"><?php echo $lieu->_adr; ?></textarea>
	  </div>
	  <div class="input-group mb-3 col-md-6">
	    <div class="input-group-prepend">
	      <span class="input-group-text" id='lcovid'>
	      	<a href="#" data-toggle="tooltip" title="Saisir les informations liées au COVID 19" style="color:white">Corona</a></span>
	    </div>
	    <textarea id='tcovid' type="text" name="covid" row=2 class="form-control" 
	    onchange="isSaisie('tcovid', 'lcovid', true)" placeholder="Informations spécifiques liés au COVID-19"><?php  echo $lieu->_covid; ?></textarea>
	  </div>
	</div> <!-- fin linge -->
	<div class="row">
	  <div class="input-group mb-3 col-md-6">
	    <div class="input-group-prepend">
	      <span class="input-group-text" id='lact'><a href="#" data-toggle="tooltip" title="Préciser l'activité, saisir les mots clés utiles pour les recherches" style="color:white">Activité</a></span>
	    </div>
	    <textarea id='tact' type="text" name="activite" row=2 class="form-control" placeholder="Informations générales , mot clé de recherche" 
	    onchange="isSaisie('tact', 'lact', true)"><?php echo $lieu->_activite  ?></textarea>
	  </div>
	  <div class="input-group mb-3 col-md-6">
	    <div class="input-group-prepend">
	      <span class="input-group-text" id='lhoraires' >Horaires</span>
	    </div>
	    <textarea id='thoraires' type="text" name="horaires" row=2 class="form-control" 
	    onchange="isSaisie('thoraires', 'lhoraires', true) "placeholder="Horaires"><?php echo $lieu->_horaires; ?></textarea>
	  </div>
  

	</div> <!-- fin linge -->

		<!-- Latitude et Lognitudes -->	
		<div id='latlng' class="row" >
			 <div class="input-group mb-3 col-md-6">
			    <div class="input-group-prepend">
			      <span class="input-group-text">Latitude</span>
			    </div>
			    <input type="text" name="latitude" <?php echo 'value="' .$lieu->_latitude . '"' ;?> disabled></input>
			</div> 
			<div class="input-group mb-3 col-md-6">
			    <div class="input-group-prepend">
			      <span class="input-group-text">Longitude</span>
			    </div>
			    <input type="text" name="longitude" <?php echo 'value="' .$lieu->_longitude . '"' ;?> disabled></input>
			</div> 
		</div>
</div>

</div>		<!-- Fin cadre -->

<div id="cadre>" style="border-style: solid; border-width:3px;margin-top:3px;margin-left:3px;margin-right:3px;border-color:darkmagenta">
	<div class="row">
		<div class=col-md-2> 
		      <div class="custom-control custom-switch">
			    <input type="checkbox" class="custom-control-input" id="scommande" 
			    name='commande' <?php if($lieu->_cde==true) {echo 'checked';} ?> onclick="couvert('scommande', 'lcommande','Suivant Modalités', 'Sur place')">
			    <label class="custom-control-label" for="scommande" id='lcommande'><?php if($lieu->_cde==true) {echo 'Suivant Modalités';} else {echo 'Sur Place';}  ?></label>
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
		    <textarea type="text" name="cde_modalites" row=2 class="form-control" placeholder="Préciser si les modalités pour les commandes"><?php echo $lieu->_cde_modalites; ?></textarea>
		 </div>
        <div class="col-md-6" style="margin-left:0px">
	  	<div class="row" >

	  		<div class="col-sm-3">
				<div class="form-check">
				  <label class="form-check-label">
				    <input type="checkbox" class="form-check-input" name="cde_cktel" id="ck_tel" 
				    <?php if($lieu->_cde_cktel==true) {echo 'checked';} ?> onclick="affiche('ck_tel' , 'tel')">Tel<i class="fas fa-phone"> </i>
				  </label>
				</div>  
			</div>
			<div class="col-sm-8" >
				<input type="text" id="tel" name="cde_notel" class="form-control" 
				<?php if($lieu->_cde_cktel==false) {echo  'style="visibility:hidden"';} ?> placeholder="Tel" <?php echo 'value="' .$lieu->_cde_notel .'"'; ?> ></input>
			</div>	
		</div>	
		<div class="row">
	  		<div class="col-sm-3">
				<div class="form-check">
				  <label class="form-check-label">
				    <input type="checkbox" <?php if($lieu->_cde_ckmail==true) {echo 'checked';} ?> name="cde_ckmail"  id='ck_mail' class="form-check-input"  onclick="affiche('ck_mail' , 'mail')">mail
				  </label>
				</div>  
			</div>
			<div class="col-sm-4">
				<input type="text"  class="form-control" name="cde_mail" id="mail" <?php if($lieu->_cde_ckmail==false) {echo  'style="visibility:hidden"';} ?> <?php echo 'value="' .$lieu->_cde_mail .'"'; ?>placeholder="Mail" ></input>
			</div>	
		</div>
		<div class="row">	
	  		<div class="col-md-3">
				<div class="form-check">	
				  <label class="form-check-label">
				    <input type="checkbox" <?php if($lieu->_cde_ckurl==true) {echo 'checked';} ?> name="cde_ckurl"  id='ck_website' class="form-check-input"  onclick="affiche('ck_website' , 'website')">Internet
				  </label>
				</div>  
			</div>
			<div class="col-md-8" id="dwebsite" >
				<input type="text" name="cde_url" id="website" <?php if($lieu->_cde_ckurl==false) {echo  'style="visibility:hidden"';} ?>  <?php echo 'value="' .$lieu->_cde_url .'"'; ?>  class="form-control" placeholder="adresse du site"></input>
			</div>
		</div>



		</div> <!-- fin linge -->

	</div>		<!-- Fin cadre -->

    <!-- Cadre pour les Commndes et Livraison -->

	<div id='dliv' class="row">		
		<div class=col-md-2> 
		      <div class="custom-control custom-switch">
			    <input type="checkbox" class="custom-control-input" id="slivraison" 
			    name='livraison' <?php if($lieu->_liv==true) {echo 'checked';} ?> 
			    onclick="couvert('slivraison', 'llivraison','Suivant Modalités', 'Sur place')">
			    <label class="custom-control-label" for="slivraison" id='llivraison'><?php if($lieu->_cde==true) {echo 'Suivant Modalités';} else {echo 'Sur Place';}  ?></label>
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
		    name="liv_modalites" ><?php echo $lieu->_liv_modalites; ?></textarea>
		    	
		 </div>

		 <div class="input-group mb-3 col-md-6">
		    <div class="input-group-prepend">
		      <span class="input-group-text" id="ldelai">Delai</span>
		  	</div>

		  
		    <textarea type="text" name='liv_delais' id='tdelai' row=2 class="form-control"  placeholder="Indiquer le délai estimé pour les livraisons" 
		    ><?php echo $lieu->_liv_delais; ?></textarea>
		    	
		 </div>
	</div> <!-- fin ligne-->

	</div>		<!-- Fin cadre -->

    <button type="submit" style="margin-top:3px" name="btn_inscrire" id="btn_inscrire" type="button" class="btn btn-primary btn-block">Enregistrer les infos </button>
</form>    
</body>	
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
	});

$(document).ready(init());
function init()
{
	isSaisie('ladr','tadr',true);	isSaisie('tadr','ladr',true);
	isSaisie('tact','lact',true);
	isSaisie('tcovid','lcovid',true);
	isSaisie('thoraires','lhoraires',true);
	couvert('scommande', 'lcommande','Suivant Modalité', 'Sur place');
	couvert('souvert', 'louvert', 'Ouvert', 'Fermé')
	couvert('slivraison', 'llivraison','Suivant Modalités', 'Sur place')
}	
function affiche(coche, element)
{
  // Faire apparaitre suivant check
 if (document.getElementById(coche).checked==true)
 	{ var val = 'visible'} else { var val = 'hidden'}
 document.getElementById(element).style.visibility= val  ;
 console.log(document.getElementById(coche))

}	
function couvert(coche, element,texton,textoff)
{
  // Faire apparaitre suivant check
 gcoche = document.getElementById(coche);
 gelt = document.getElementById(element);
 if (gcoche.checked==true)
 	{ gelt.innerHTML = texton
 	  gelt.style.color = 'green'	
 	  gcoche.style.color = 'green'	
	} 
 else 
 	{ gelt.innerHTML = textoff
	  gelt.style.color = 'red'	}

 console.log(gcoche)
 console.log(gelt)
}
function isSaisie(element, label, requiredfield)
{
 gelt = document.getElementById(element);
 glabel = document.getElementById(label);
 console.log(gelt.value) ;
 console.log(gelt.innerHTML) ;
 if (gelt.value != '')
	 {console.log('non vide')
	 glabel.style.backgroundColor = "green" ;
	 glabel.style.color = "white" ;

	 }
 if (gelt.value == '')	
    { console.log('vide')
    if (requiredfield == true) 	
    	{
		 glabel.style.backgroundColor = "red" ;
		 glabel.style.color = "white" ;
		 }
	else
		 {
		 glabel.style.backgroundColor = "gray" ;
		 glabel.style.color = "black" ;
		 } 	 
    } 

}
</script>	