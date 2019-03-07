<?php
/*
 * Ce fichier est appellé via une requête AJAX
 * pour la création d'un nouvel article
 *
 * TODO : gerer les cas d'erreurs
 */

require_once('../loader.php');

// Récupération des paramettres de la requête AJAX
$id   = (! empty($_POST['id'])) ? $_POST['id'] : 0;

// Suppression de l'utilisateur dans la base de données
deleteUser($id);
