<?php
/*
 * Ce fichier est appellé via une requête AJAX
 * pour la création d'un nouvel article
 *
 * TODO : gerer les cas d'erreurs
 */

require_once('../loader.php');

// Récupération des paramettres de la requête AJAX
$username   = (! empty($_POST['username'])) ? $_POST['username'] : 'erreur';
$firstname = (! empty($_POST['firstname'])) ? $_POST['firstname'] : 'erreur';
$email = (! empty($_POST['email'])) ? $_POST['email'] : 'erreur';

// Création d'un objet Article
$user = new User();
$user->username = $username;
$user->firstname = $firstname;
$user->email = $email;

// Création d'un utilisateur dans la base de données
insertUser($user);

// transformation de l'utilisateur au format JSON
echo json_encode($user);
