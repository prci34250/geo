/*
 Exercice : afficher l'enfant d'un objet du DOM
*/

  
function prepaAffichage(results, lator,lngor)
{
// Preparation de l'affichage a partir des résultats
// de la recherche avec acces BDD
	for each (results -> resultat)
	{
		console.log('Traiter resultat:' + resultat) ;
	}

}

function vide {
// Le contenu HTML de l'élément identifié par "contenu"
copyHTML = document.getElementById("contenu").innerHTML;
const newElt = document.createElement("div");
newElt.innerHTML = copyHTML ;
newElt.id="new element"
// Changer les valeurs
//newElt.getElementById("titre").innnerHTML='Nouveau contenu modife'  ;
console.log(newElt)
document.body.appendChild(newElt);
console.log(document.getElementById("titre")) ;
}