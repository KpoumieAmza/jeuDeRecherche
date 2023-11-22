<?php
   $bdd= new PDO('mysql:host=localhost;dbname=auta;', 'root', '');
  if(isset($_GET['stock']) AND !empty($_GET['stock'])){
    $getstock=$_GET['stock'];
$recupArticle= $bdd->prepare('SELECT * FROM `site_users` WHERE stock = ?');
$recupArticle->execute(array($getstock));
     if($recupArticle->rowCount() > 0){
        $amza=$recupArticle->fetch();
        $titre = $amza['name'];

        $code=$amza['code'];
        $photo= $amza['photo'];

        if(isset($_POST['submit'])){
            $nom_saisi=htmlspecialchars($_POST['name']);
            $code_saisi=nl2br($_POST['code']);
            $photo_saisi=$_POST['photo'];
            $updat=$bdd->prepare('UPDATE sie_users SET name=? , code=?, photo=? WHERE stock=?');
            $updat->execute(array($nom_saisi, $code_saisi, $photo_saisi , $getstock));
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
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form  method="POST">
     <h1><strong>Ajoute un produit</strong></h1>
     <textarea name="" id="are" ></textarea><br><br>
     <label for=""><strong>Nom:</strong></label>
     <input type="text" name="name" placeholder="entre votre nom" value="<?= $titre ; ?>" autocomplete="off" ><br><br>

     <label for=""><strong>code:</strong></label>
     <input type="text" name="code" placeholder="entre votre code" value="<?= $code; ?>" autocomplete="off"><br><br>
    
     <!--<label for=""><strong>stock:</strong></label>
     <input type="text" name="stock" min="1"><br><br>-->
     <label for=""><strong>photo:</strong></label>
     <input type="file" name="photo"  id="photo" value="<?= $photo; ?>"><br><br>
    <input type="submit" name="submit" class="submit-button" id="tbn" value="Ajouter">
    <input type="reset" class="reset-button" id="bnt2" value="Annuler">

    </form>
</body>
</html>

















<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <form method="post" action="">
        <input type="text" name="name" value="<//?= $nom ;?>" ><br>
        <textarea name="code" >
            <//?=$contenu;?>
        </textarea>
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>-->