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



 /****************************************
 *
 * Les Utilisateurs
 *
 ****************************************/

function getAllUsers()
{
    $dbh = getDBH();
    $req = $dbh->prepare('SELECT * FROM users ORDER BY id DESC');
    $req->setFetchMode(PDO::FETCH_CLASS, 'User');
    $req->execute();
   
    return $req->fetchAll();
}


function insertUser($user)
{
    $dbh = getDBH();
    $req = $dbh->prepare("INSERT INTO users (username, firstname, email) VALUES (:username, :firstname,:email)");
    $req->bindParam(':username', $user->username);
    $req->bindParam(':firstname', $user->firstname);
    $req->bindParam(':email', $user->email);
    $req->execute();
   
    // affectation de l'id de l'article avec le dernier id enregistré
    $user->id = $dbh->lastInsertId();
}


function getUser($id)
{
    $dbh = getDBH();
    $req = $dbh->prepare('SELECT * FROM users WHERE id = :id');
    $req->bindParam(':id', $id);
    $req->setFetchMode(PDO::FETCH_CLASS, 'User');
    $req->execute();
   
    return $req->fetch();
}

function deleteUser($id)
{
    $dbh = getDBH();
    $req = $dbh->prepare("DELETE FROM users WHERE id = :id");
    $req->bindParam(':id', $id);
    $req->execute();
}

function updateUser($user)
{
    $dbh = getDBH();
    $req = $dbh->prepare("UPDATE users SET username = :username, firstname = :firstname, email = :email WHERE id = :id;");
    $req->bindParam(':username', $user->username);
    $req->bindParam(':firstname', $user->firstname);
    $req->bindParam(':email', $user->email);
    $req->bindParam(':id', $user->id);
    $req->execute();
}

