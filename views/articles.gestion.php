<?php

/*
 * Page HTML divisée en 2 parties
 * - un formulaire pour la création et la mise à jour d'article
 * - une section listant les articles présents dans la base de données
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= BLOG_TITLE ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="assets/js/article.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <div id="formulaire">
    <div>
        <label for="title"> Titre de l'article </label>
        <input type="text" id="title" name="title"/></div>
    <div>
        <label for="title"> Contenu de l'article </label>
        <textarea name="content" id="content" cols="10" rows="10">            
        </textarea>
    </div>

    <div>
        <input type="button" value="Ajouter" onclick="addArticle()">
    </div>
</div>    

<h1>LES ARTICLES </h1>

<div id="articles">
  
    <?php
        foreach ($articles as $article) {
            echo $article->id ." -- ".$article->title." -- ".$article->content." --  <br/>";
        }
    ?>
</div>
    
</body>
</html>

 