/*
 * Ce fichier contient les fonctions qui vont créer des requêtes AJAX pour
 * gerer les utilisateurs : creation, affichage, modification, suppression.
 */

 /* 
  * Cette fonction transmet les données du formulaire en AJAX
  * pour la création d'un utilisateur, puis elle met à jour l'affichage 
  * de la page avec les données du nouvel utilisateur. 
  */
function addUser(){
   
    // AJAX : 1ere étape : création de l'objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // AJAX : 2éme étape : création de la fonction de rappel
    // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
    xhr.onreadystatechange = function() {

      // on traite le cas ou la requête à finie d'être initialisée 
      // et que la réponse du serveur est valide
      if (xhr.readyState == 4 && xhr.status == 200) {
            
            var users      = document.getElementById("users"); // récupération du noeud parent
            var noeud_user = document.createElement("div"); // création d'un nouveau noeud
            var user       = JSON.parse(xhr.responseText); // transformation de la réponse JSON en objet JS

            // on affecte au nouveau noeud son contenu
            noeud_user.innerHTML = "<span>"+user.username+"</span>";
            noeud_user.innerHTML +="<span>"+user.firstname+"</span>";
            noeud_user.innerHTML +="<input type='button' value='Voir' onClick='showUser("+user.id+")'>";
            noeud_user.innerHTML +="<input type='button' value='Modifier' onClick='showUser("+user.id+")'>";
            noeud_user.innerHTML +="<input type='button' value='Supprimer' onClick='deleteUser("+user.id+")'>";
            noeud_user.setAttribute("id", user.id);
            
            // on insère au debut du parent le nouvel article
            users.insertBefore(noeud_user, users.firstChild);

            // on vide le formulaire
            cleanform();
             
      }
    };

    // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
    xhr.open('POST','scripts/user.add.php');

    var data = new FormData();
    data.append('username', document.getElementById("username").value);
    data.append('firstname', document.getElementById("firstname").value);
    data.append('email', document.getElementById("email").value);


    // AJAX : 4ème étape : envoi de la requête avecles paramettres
    xhr.send(data); 
}


 /* 
  * Cette fonction transmet les données du formulaire en AJAX
  * pour la suppression d'un utilisateur, puis elle met à jour l'affichage 
  * de la page . 
  */
function deleteUser(user_id){
   
  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange = function() {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la réponse du serveur est valide
    if (xhr.readyState == 4 && xhr.status == 200) {
          
          var users      = document.getElementById("users"); // récupération du noeud parent
          var noeud_user = document.getElementById(user_id); // récupération du noeud de l'utilisateur

          // on supprime le noeud au debut du parent le nouvel article
          users.removeChild(noeud_user);
           
    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST','scripts/user.delete.php');

  var data = new FormData();
  data.append('id', user_id);

  // AJAX : 4ème étape : envoi de la requête avecles paramettres
  xhr.send(data); 
}


 /* 
  * Cette fonction transmet les données du formulaire en AJAX
  * pour la suppression d'un utilisateur, puis elle met à jour l'affichage 
  * de la page . 
  */
 function showUser(user_id){
   
  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange = function() {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la réponse du serveur est valide
    if (xhr.readyState == 4 && xhr.status == 200) {
          
          var user    = JSON.parse(xhr.responseText);

          document.getElementById("firstname").value = user.firstname; 
          document.getElementById("username").value = user.username; 
          document.getElementById("email").value = user.email; 

          document.getElementById("id_user").value = user.id; 
          document.getElementById("btn_update").className = "visible"; 
          document.getElementById("btn_create").className = "hidden";   
          
    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST','scripts/user.show.php');

  var data = new FormData();
  data.append('id', user_id);

  // AJAX : 4ème étape : envoi de la requête avec les paramettres
  xhr.send(data); 
}


function updateUser(){
   
  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange = function() {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la réponse du serveur est valide
    if (xhr.readyState == 4 && xhr.status == 200) {
          
          var users   = document.getElementById("users"); // récupération du noeud parent
          var user    = document.getElementById(document.getElementById("id_user").value); // récupération du noeud de l'utilisateur

          // on supprime le noeud au debut du parent le nouvel article
          users.removeChild(user);

          // on crée le nouveau noeud
          var noeud_user = document.createElement("div"); // création d'un nouveau noeud
          var user = JSON.parse(xhr.responseText); // transformation de la réponse JSON en objet JS

          // on affecte au nouveau noeud son contenu
          noeud_user.innerHTML = "<span>"+user.username+"</span>";
          noeud_user.innerHTML +="<span>"+user.firstname+"</span>";
          noeud_user.innerHTML +="<input type='button' value='Voir' onClick='showUser("+user.id+")'>";
          noeud_user.innerHTML +="<input type='button' value='Modifier' onClick='showUser("+user.id+")'>";
          noeud_user.innerHTML +="<input type='button' value='Supprimer' onClick='deleteUser("+user.id+")'>";

          noeud_user.setAttribute("id", user.id);
          
          // on insère au debut du parent le nouvel article
          users.insertBefore(noeud_user, users.firstChild);

          // on vide le formulaire
          cleanform();
           
    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST','scripts/user.update.php');

  var data = new FormData();
  data.append('username', document.getElementById("username").value);
  data.append('firstname', document.getElementById("firstname").value);
  data.append('email', document.getElementById("email").value);
  data.append('id', document.getElementById("id_user").value);


  // AJAX : 4ème étape : envoi de la requête avecles paramettres
  xhr.send(data); 
}


function cleanform(){
  document.getElementById("username").value = null;
  document.getElementById("firstname").value = null;
  document.getElementById("email").value = null;
  document.getElementById("btn_update").className = "hidden"; 
  document.getElementById("btn_create").className = "visible"; 
}