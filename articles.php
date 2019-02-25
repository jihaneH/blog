<?php

/*
 * Ce fichier est le point d'entrée de la gestion des articles :
 *  Création | Affichage | Modification | Suppression
 * 
 * A l'appel de ce fichier, les articles présents dans la base de données seront chargés.
 * Ensuite, l'integralité de la gestion des articles se fera en AJAX. 
 * 
 */

require_once('loader.php');

// recuperer les articles
$articles = getAllArticle();

// charger la vue
require_once('views/articles.gestion.php');

?>
