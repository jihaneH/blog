<?php
/*
 * Ce fichier est appellé via une requête AJAX
 * pour la création d'un nouvel article
 *
 * TODO : gerer les cas d'erreurs
 */

require_once('../loader.php');

// Récupération des paramettres de la requête AJAX
$title   = (! empty($_POST['title'])) ? $_POST['title'] : 'erreur';
$content = (! empty($_POST['content'])) ? $_POST['content'] : 'erreur';

// Création d'un objet Article
$article = new Article();
$article->title = $title;
$article->content = $content;

// Sauvegarde de l'article dans la base de données
insertArticle($article);

// transformation de l'article au format JSON
echo json_encode($article);
