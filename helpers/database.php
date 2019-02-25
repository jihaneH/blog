<?php

/*
 * Ce fichier contient toutes les fonctions en lien avec la base de données
 * - creation d'objet dans la base de données
 * - modification d'objet dans la base de données
 * - suppression d'objet dans la base de données
 * - recupération d'objet dans la base de données
 * ...
 */

function getDBH()
{
    try {
        return new PDO(DSN, USER, PASSWORD);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
}

/****************************************
 *
 * LES ARTICLES
 *
 ****************************************/

 function getAllArticle()
 {
     $dbh = getDBH();
     $req = $dbh->prepare('SELECT * FROM articles ORDER BY id DESC');
     $req->setFetchMode(PDO::FETCH_CLASS, 'Article');
     $req->execute();
    
     return $req->fetchAll();
 }

 function insertArticle($article)
 {
     $dbh = getDBH();
     $req = $dbh->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");
     $req->bindParam(':title', $article->title);
     $req->bindParam(':content', $article->content);
     $req->execute();
    
     // affectation de l'id de l'article avec le dernier id enregistré
     $article->id = $dbh->lastInsertId();
 }
