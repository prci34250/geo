<?php

// Recuperation des eventuelle varaibles

function createLieu($lieu)
{
  //*** Update et non crete pour cle existante **
   if (cleexiste($lieu->_keylieu)!= false)
    { updateLieu($lieu)	;
      return ;}
  //*********************************************
echo '<H4><span style="color:green"> Inscription du lieu effectuée</span><H4>' ;
//echo '<br>test = ' . guillemet('test dune chine" avec" ')  . '<BR>';
  $bdd=connectbase() ;

  $insert = 'INSERT INTO `geo_lieu` ( `keylieu`, `adresse`, `latitude`, `longitude`, `open`, activite, `covid`, `horaires`, `cde`, `cde_description`, `cde_cktel`, `cde_notel`, `cde_ckmail`, `cde_mail`, `cde_ckurl`, `cde_url`, `liv`, `liv_description`, `liv_delais`) ' ;

  $key = md5(time()) ; //echo $key ;

  $values =  '"' . htmlspecialchars($key) .'"' ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_adr)) .'"'              ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_latitude)) .'"'         ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_longitude)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_ouvert)) .'"'        ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_activite)) .'"'        ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_covid)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_horaires)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde_modalites)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde_cktel)) .'"'        ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde_notel)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde_ckmail)) .'"'        ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde_mail)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde_ckurl)) .'"'       ; 
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_cde_url)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_liv)) .'"'      ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_liv_modalites)) .'"'   ;
  $values  = $values . ', "' . htmlspecialchars(guillemet($lieu->_liv_delais)) .'"'        ;

  $sql = $insert . " VALUES (" . $values . ")" ;
  //echo '<BR><H3>' . $sql ;
  $bdd->query($sql) or die(print_r($bdd->errorInfo()));

  // Mise à jour des infos de retour
  $lieu->_keylieu = $key;
  $lieu->_idlieu =  cleexiste($key);
  $_SESSION['lieu'] = $lieu ;
  return $lieu ;
}

function updateLieu($lieu)
{
  //echo '<BR><H4> Entree fonction Update </H4> <BR> ' . $lieu->_keylieu  . ' .. '  . $lieu->_idlieu ;
  $update = 'UPDATE `geo_lieu` SET ' ;
  $update = $update . '`adresse`=' . "'" .htmlspecialchars(guillemet($lieu->_adr)) . "'" ;
  $update = $update . ',`latitude`='. "'" .htmlspecialchars(guillemet($lieu->_latitude)) ."'" ;
  $update = $update . ',`longitude`=' . "'" .htmlspecialchars(guillemet($lieu->_longitude)) ."'";
  $update = $update . ',`open`=' . "'" .htmlspecialchars(guillemet($lieu->_ouvert)) ."'" ; 
  $update = $update . ',`activite`=' . "'" .htmlspecialchars(guillemet($lieu->_activite)) ."'" ; 
  $update = $update . ',`covid`=' . "'"  .htmlspecialchars(guillemet($lieu->_covid)).  "'";
  $update = $update . ',`horaires`=' . "'"  .htmlspecialchars(guillemet($lieu->_horaires)) ."'";
  $update = $update . ',`cde`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde)). "'";
  $update = $update . ',`cde_description`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde_modalites)) ."'";
  $update = $update . ',`cde_cktel`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde_cktel)) ."'";
  $update = $update . ',`cde_notel`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde_notel)) . "'";
  $update = $update . ',`cde_ckmail`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde_ckmail)). "'";
  $update = $update . ',`cde_mail`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde_mail)). "'";
  $update = $update . ',`cde_ckurl`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde_ckurl)). "'";
  $update = $update . ',`cde_url`=' . "'"  .htmlspecialchars(guillemet($lieu->_cde_url)). "'";
  $update = $update . ',`liv`=' . "'"  .htmlspecialchars(guillemet($lieu->_liv)). "'";
  $update = $update . ',`liv_description`=' . "'"  .htmlspecialchars(guillemet($lieu->_liv_modalites)). "'";
  $update = $update . ',`liv_delais`=' . "'"  .htmlspecialchars(guillemet($lieu->_liv_delais)). "'"; 
  $update = $update . 'WHERE  idlieu ='   . $lieu->_idlieu . ';' ;

  //echo '<br> ' . $update ;
  $bdd=connectbase() ;
  $bdd->query($update) or die(print_r($bdd->errorInfo()));
  echo '<H4><span style="color:green"> Infos mise à jour du lieu effectuée</span><H4>' ;
  return ;
}

// Acces avec les coordonnees
// Detection lieu dejà saisi
function lirecoordonnees($lieu)
{
 $bdd=connectbase() ;	
 $sql = 'SELECT * FROM  geo_lieu WHERE latitude =' . $lieu->_latitude  . ' AND longitude = '  . $lieu->_longitude  ;
 //echo '<BR> sql = ' . $sql ;
 $results = $bdd->query($sql) or die(print_r($bdd->errorInfo()));
 if ($results->rowCount()==0) 
 {
 	//echo 'coordonnees non enregistrées existe pas : ' . $lieu->_adr;
 	return false ;
 }
 // Trouve lieu avec les coordonnees
  $lieulu = $results->fetch() or die(print_r($bdd->errorInfo())) ;
  $results->closecursor() ;
  //echo '<BR><BR>bdd:<BR>' ;
  //echo 'coordonnees déjà enregistrées :   ' . $lieu->_adr;
  //var_dump ($lieulu) ;
  //echo '<BR><BR>objet:<BR>';
  $lieu->_idlieu = $lieulu['idlieu'] ;
  $lieu->_keylieu = $lieulu['keylieu'] ;
$lieu->_adr = $lieulu['adresse'] ;
$lieu->_latitude = $lieulu['latitude'] ;
$lieu->_longitude = $lieulu['longitude'] ;
$lieu->_ouvert = $lieulu['open'] ;
$lieu->_activite = $lieulu['activite'] ;
$lieu->_covid = $lieulu['covid'] ;
$lieu->_horaires = $lieulu['horaires'] ;
$lieu->_cde = $lieulu['cde'] ;
$lieu->_cde_modalites = $lieulu['cde_description'] ;
$lieu->_cde_cktel = $lieulu['cde_cktel'] ;
$lieu->_cde_notel = $lieulu['cde_notel'] ;
$lieu->_cde_ckmail = $lieulu['cde_ckmail'] ;
$lieu->_cde_mail = $lieulu['cde_mail'] ;
$lieu->_cde_ckurl = $lieulu['cde_ckurl'] ;
$lieu->_cde_url = $lieulu['cde_url'] ;
$lieu->_liv = $lieulu['liv'] ;
$lieu->_liv_modalites = $lieulu['liv_description'] ;
$lieu->_liv_delais = $lieulu['liv_delais'] ;

  var_dump ($lieu) ;

  $_SESSION['lieu'] = $lieu ;
  return true ;
}
function cleexiste($key)
{
 $bdd=connectbase() ;	
 $sql = 'SELECT * FROM  geo_lieu WHERE keylieu =' . '"' . $key  . '"' ;
 $results = $bdd->query($sql) or die(print_r($bdd->errorInfo()));
 if ($results->rowCount()==0) 
 {
 	//echo 'existe pas  ' . $key ;
 	return false ;
 }
 {
   //echo 'existe ' .  $key ;
   $lieu = $results->fetch() or die(print_r($bdd->errorInfo()));
   return $lieu['idlieu' ];
 }
 var_dump($results) ;
 //echo '<BR>' .mysql_num_rows($results);
}

function guillemet($chaine)
{
  $chaine = str_replace('"', '""', $chaine ) ;
  $chaine = str_replace("'", "''", $chaine ) ;
  return $chaine ;
}
