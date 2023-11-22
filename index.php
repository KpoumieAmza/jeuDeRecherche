<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <a href="membres.php">afficher tous membres</a><br>
    <a href="article.php">afficher tous les articles</a><br>
    <a href="publier-article.php">publier les articles </a>
</body>
</html>