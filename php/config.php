<?php
//var_dump($_SERVER) ;
if (!isset($_SESSION['page'])) {session_start() ;}
$_SESSION['config']=true;
// session_start() ;
if  (trim($_SERVER['HTTP_HOST'])=='localhost:8888') {$environnement='local';} else {$environnement='distant';}// Varaible environnement

global $environnement ;
global $branche ;
global $prod_pswd ; $prod_pswd = '#..QtKUf#U*TUr2' ;
global $prod_bdd_name ; $prod_bdd_name= 'dbu67884';
// Prefix a utiliser pour les mail et les pages  en prod (en valuer abolue)
global $href_prefix ; if ($environnement=='local') {$href_prefix='..';} else {$href_prefix='http://www.covide.fr';} 
global $echo ; if ($environnement=='local') {$echo =true;} else {$echo=false;} 
if ($branche=='tests') {$echo =true;} else {$echo=false;} 


//echop('environnement=' . $environnement .' <br> prefix=' .$href_prefix) ;
//forcé à distant pour test
//$environnement = 'distant' ;
$branche = trim($_SERVER['SCRIPT_NAME']) ; 
//echop ($branche) ;
$posx =  strrpos($branche,  '/');
//echop ('pos / =' .$posx) ;
$branche = substr($branche, 1, $posx-1);
//echo ('<br><br><br>') ;
echop ('environnement='.$environnement .' branche=' .$branche ) ;

// enregister la branche et envieronnement
$_SESSION['branche'] = $branche ; $_SESSION['environnement'] = $environnement ; 

//Lecture des droits (si pas encore signé)

function Connectbase()
// Connexion en fonction de l'environnemt
{
	global $environnement ;
	if ($environnement=='local') {return Connectbase_local();}
	if ($environnement=='distant') {return Connectbase_prod();}
}
function Connectbase_local()
{
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=covide;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
  echop ('Connexion BDD Local Réussie') ;
  return $bdd; 
}

function Connectbase_prod()
{
  $host_name = 'db5000339250.hosting-data.io';
  $database = 'dbs329972';
  $user_name = 'dbu280536';
  $password = 'jaimePalavas@34250';

  /*try {
  $connect = new PDO('mysql:host=' .$hostname . ';dbname=' .$database .';charset=utf8\' ,' .$user_name . ', ' . $password .', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) ' ; } */
  try {
  $connect = new PDO('mysql:host=db5000339250.hosting-data.io;dbname=dbs329972;charset=utf8', 'dbu280536', 'jaimePalavas@34250', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); } 
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
 /*if (mysql_errno()) {
    die('<p>La connexion au serveur MySQL a échoué: '.mysql_error().'</p>');
  } else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p >'; */
  echop (' Connexion BDD Prod Réussie') ;
  return $connect; 
}
// a definir



function echop($text)
{
  
  global $echo ;
  $echo=false ;
  if ($echo==true)
	{echo ('<p><span style="color:purple">' .$text . '</span></p>');}
}
?>
