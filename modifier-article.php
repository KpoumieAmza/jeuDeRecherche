<?php
   $bdd= new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
  if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid=$_GET['id'];
$recupArticle= $bdd->prepare('SELECT * FROM article WHERE id = ?');
$recupArticle->execute(array($getid));
     if($recupArticle->rowCount() > 0){
        $aticleInfor=$recupArticle->fetch();
        $titre = $aticleInfor['titre'];

        $contenu=  $aticleInfor['description'];
        if(isset($_POST['valider'])){
        $titre_saisi=htmlspecialchars($_POST['titre']);
        $description_saisi=nl2br($_POST['description']);

        $updat=$bdd->prepare('UPDATE article SET titre=? , description=? WHERE id=?');
        $updat->execute(array($titre_saisi,$description_saisi, $getid ));
    }

    }else{
        echo "Aucun article trouve";

   }
 }else{
    echo "Aucun identifiant trouve";
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
    
    <form method="post" action="">
        <input type="text" name="titre" value="<?=$titre ;?>" ><br>
        <textarea name="description" id="" cols="30" rows="10">
            <?=$contenu;?>
        </textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>