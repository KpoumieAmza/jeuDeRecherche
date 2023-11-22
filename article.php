<?php 
    session_start();
    $bdd= new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
    
    if(!$_SESSION['mdp']){
       header('location: connexion.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       $recupArticle= $bdd->query('SELECT * FROM article');
       while($article = $recupArticle->fetch() ){
        ?>

        <div class="article" style="border: 1px solid black ;" >
            <h1> <?= $article['titre'];?></h1>
            <p> <?=$article['description'];?></p>
         <a href="supprimer-article.php?id=<?=$article['id']; ?>">
            <button style="color:black; background-color:yellow;  margin-bottom: 10px;">supprimer  </button>
            
        </a>

        <a href="modifier-article.php?id=<?=$article['id']; ?>">
            <button style="color:black; background-color: red;  margin-bottom: 10px;">modifier </button>
        
        </a>

        </div>
        <br>
        <?php
       }
    ?>
</body>
</html>