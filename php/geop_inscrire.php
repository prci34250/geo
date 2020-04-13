<?php

// Recuperation des eventuelle varaibles
include '../php/config.php' ;
class lieu
{

	 public $_idlieu ;	
	 public $_keylieu ;
	 public $_adr;
	 public $_latitutde ;
	 public $_longitude ;
	 public $_ouvert; // O ferme 1 ouvert	 
	 public $_activite ;
	 public $_covid;
	 public $_horaires;

	 public $_cde  ; // 1 possible , 0 pas possbibble
	 public $_cde_modalites;
	 public $_cde_cktel;
	 public $_cde_notel;
	 public $_cde_ckmail;
	 public $_cde_mail;
	 public $_cde_ckurl;
	 public $_cde_url;	

	 public $_liv  ; // 1 possible , 0 pas possbibble
	 public $_liv_modalites;
	 public $_liv_delais;



	function __construct(){
	    $this->_keylieu = '' ;
		$this->_activite = '' ;
		$this->_covid    = '' ;
		$this->_horaires = '' ;
		$this->_activite = '' ;
		$this->_ouvert = true ; // O ferme 1 ouvert
		$this->_cde_modalites = '';
		$this->_cde_cktel = false;
		$this->_cde_notel = '';
		$this->_cde_ckmail = false;
		$this->_cde_mail  ='';
		$this->_cde_ckurl = false;
		$this->_cde_url  = '' ;
		$this->_liv = false ;
		$this->_liv_modalites = '' ;
		$this->_liv_delais = '' ;
	}

	private function maFonctionPrive(){

	}

	public function maFunctionPublic(){

	}

}
require('../bdd/geob_inscrire.php') ;
// Entree dans la fonction
// Recuperer les infos passer en parametre dans URL (premiere entree)
//echo '<H1> Covid : ' .$_POST['covid']  .'</H1><BR>'  ;
if (isset($_GET['loc']))
	{
	$lieu = new lieu() ;
	$lieu->maFunctionPublic();
	if (isset($_GET['loc'])){$lieu->_adr = $_GET['loc'] ;}
	if (isset($_GET['lat'])){$lieu->_latitude = $_GET['lat'] ;}
	if (isset($_GET['lng'])){$lieu->_longitude = $_GET['lng'] ;}
	//$lieu->covid = ''; 
	//$lieu->activite = '' ;
	//$lieu->horaires = '' ;
	$_SESSION['lieu'] = $lieu ;

    // lecture avec coordonnées pour
    // lieu déjà coonnu
        if (lirecoordonnees($lieu) == True)
	    {
	    	// Session mise à jour automatiquement dans la fonction
	    	$lieu = $_SESSION['lieu']  ;
	    }

	}
// Recuperer les valeurs saisies	
else
   {
   	$lieu = $_SESSION['lieu'];
   	//echo '<H1> _ouvert: ' .$_POST['ouvert']  .'</H1><BR>'  ;
   	//var_dump($_POST['liv_delais'] ) ;
   	$lieu->_ouvert=0;
   	if (isset($_POST['ouvert'])) 
   		{if ($_POST['ouvert']=='on' ) {$lieu->_ouvert = true;}}

    //echo '<br><H4> $lieu delai=' .$lieu->liv_delais . '</H4><BR>'  ;

   	$lieu->_activite = $_POST['activite'] ;
   	$lieu->_covid = $_POST['covid'] ;
   	$lieu->_horaires = $_POST['horaires'] ;

   	$lieu->_cde=0 ;
   	if (isset($_POST['commande'])) 
   		{if ($_POST['commande']=='on' ) {$lieu->_cde = true;}}



   	$lieu->_cde_modalites = $_POST['cde_modalites'] ;
   	$lieu->_cde_cktel = 0;	
   	if (isset($_POST['cde_cktel'])) {$lieu->_cde_cktel = true;}
	$lieu->_cde_notel = $_POST['cde_notel'] ;

   	$lieu->_cde_ckmail = 0;	
   	if (isset($_POST['cde_ckmail'])) {$lieu->_cde_ckmail = true ;}
	$lieu->_cde_mail = $_POST['cde_mail'] ;

   	$lieu->_cde_ckurl = 0;	
   	if (isset($_POST['cde_ckurl'])) {$lieu->_cde_ckurl =true ;}
	$lieu->_cde_url = $_POST['cde_url'] ;

   	$lieu->_liv=0 ;
   	if (isset($_POST['livraison'])) 
   		{if ($_POST['livraison']=='on' ) {$lieu->_liv = true;}}
	$lieu->_liv_modalites = $_POST['liv_modalites'] ;
	$lieu->_liv_delais = $_POST['liv_delais'] ;
   }
//var_dump ($lieu) ;
//*   
//   echo '<br>btn =' .$_POST['btn_inscrire'] ;

//var_dump($lieu);
require('../view/geov_inscrire.php') ;
if (isset($_POST['btn_inscrire']))
	{$lieu = createLieu($lieu) ;}
//echo '<BR> retour insertion ' ;

