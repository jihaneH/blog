<?php

/*
 * Ce fichier est le point d'entrée de la gestion des utilisateurs :
 *  Création | Affichage | Modification | Suppression
 * 
 * A l'appel de ce fichier, les utilisateurs présents dans la base de données seront chargés.
 * Ensuite, l'integralité de la gestion des utilisateurs se fera en AJAX. 
 * 
 */

require_once('loader.php');

// recuperer les utilisateurs
$users = getAllUsers();

// charger la vue
require_once('views/users.gestion.php');

?>
