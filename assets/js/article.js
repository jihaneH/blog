/*
 * Ce fichier contient les fonctions qui vont créer des requêtes AJAX pour
 * gerer les articles : creation, affichage, modification, suppression.
 */

 /* 
  * Cette fonction transmet les données du formulaire en AJAX
  * pour la création d'un article, puis elle met à jour l'affichage 
  * de la page avec les données du nouvel article. 
  */
function addArticle(){
   
    // AJAX : 1ere étape : création de l'objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // AJAX : 2éme étape : création de la fonction de rappel
    // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
    xhr.onreadystatechange = function() {

      // on traite le cas ou la requête à finie d'être initialisée 
      // et que la répose du serveur est valide
      if (xhr.readyState == 4 && xhr.status == 200) {
            
            var articles   = document.getElementById("articles"); // récupération du noeud parent
            var newarticle = document.createElement("div"); // création d'un nouveau noeud
            var article    = JSON.parse(xhr.responseText); // transformation de la réponse JSON en objet JS

            // on affecte au nouveau noeud son contenu
            newarticle.innerHTML = +article.id+" -- "+article.title+" -- "+article.content+" --";
            
            // on insère au debut du parent le nouvel article
            articles.insertBefore(newarticle, articles.firstChild);
             
      }
    };

    // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
    xhr.open('POST','scripts/article.add.php');

    var data = new FormData();
    data.append('title', document.getElementById("title").value);
    data.append('content', document.getElementById("content").value);


    // AJAX : 4ème étape : envoi de la requête avecles paramettres
    xhr.send(data); 
}