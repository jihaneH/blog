<?php

/*
 * Page HTML divisée en 2 parties
 * - un formulaire pour la création et la mise à jour des utilisateurs
 * - une section listant les utilisateurs présents dans la base de données
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= BLOG_TITLE ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="assets/js/utilisateur.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <div id="formulaire">
    <div>
        <label for="username"> Nom de l'utilisateur </label>
        <input type="text" id="username" name="username"/>
    </div>
    <div>
        <label for="firstname"> Prénom de l'utilisateur </label>
        <input type="text" id="firstname" name="firstname"/>
    </div>
    <div>
        <label for="email"> Email de l'utilisateur </label>
        <input type="email" id="email" name="email"/>
    </div>

        <input type="hidden" id="id_user" name="id_user"/>

    <div>
        <input type="button" value="Ajouter" onclick="addUser()" id="btn_create" class="visible">
        <input type="button" value="Modifier" onclick="updateUser()" id="btn_update" class="hidden">
    </div>
</div>    

<h1>Les Utilisateurs </h1>

<div id="users">
  
    <?php foreach ($users as $user) : ?>
            
        <div id="<?= $user->id ?>">
             <span><?=$user->username ?></span>
             <span><?=$user->firstname?></span>
             <input type="button" value="Voir" onClick="showUser('<?= $user->id ?>')">
             <input type="button" value="Modifier" onClick="showUser('<?= $user->id ?>')">
             <input type="button" value="Supprimer" onClick="deleteUser('<?= $user->id ?>')">
        </div>       
    <?php endforeach ?>
</div>
    
</body>
</html>

 