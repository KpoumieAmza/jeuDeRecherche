<?php
    session_start();
    $bdd= new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
    if(!$_SESSION['mdp']){
        //header('Location: connexion.php');
    }
    if(isset($_POST['envoi'])){
        if(!empty($_POST['titre']) AND !empty($_POST['description'])){
            $titre= htmlspecialchars($_POST['description']);
            $contenu=nl2br(htmlspecialchars($_POST['description']));
            $insereArticle = $bdd->prepare('INSERT INTO article(titre, description)VALUES(?, ?)');
            $insereArticle->execute(array($titre,$contenu));
            echo "l'article a bien ete envoyer";
        }else{
            echo "veuille entre tous les champs...";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>publier un article</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="titre" placeholder="entre le titre de l'article"><br>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="envoi">

    </form>
</body>
</html>