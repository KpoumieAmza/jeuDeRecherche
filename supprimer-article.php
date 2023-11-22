<?php
$bdd= new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
 if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid=$_GET['id'];
    $recupArticle= $bdd->prepare('SELECT * FROM article WHERE id = ?');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() >0 ){
       $deletArticle= $bdd->prepare('DELETE FROM  article WHERE id = ?'); 
       $deletArticle ->execute(array($getid));
       header('Location: article.php');
    }else{
        echo "Aucun article trouve";
    }
 }else{
    echo "Aucun identifiant trouve";
 }
?>