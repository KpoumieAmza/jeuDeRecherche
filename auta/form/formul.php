<?php
require_once("connection.php");

/* $_server="localhost";
$user="root";
$pw="";
$bdd="auta";
$db=new mysqli($_server,$user,$pw, $bdd);*/
if(isset($_POST['submit'])){
    if(!empty($_POST['name']) && !empty($_POST['code']) && !empty($_POST['photo'])){
$nom=htmlspecialchars($_POST['name']);
$code=$_POST['code'];
$photo=$_POST['photo'];

$rq=$db->prepare ("INSERT INTO `site_users` (`name`, `code`, `photo`)
VALUE('$nom','$code', '$photo') ");
$rq->execute(array($nom, $code, $photo)) ;
echo "<pre>";
print_r($rq);
echo "</pre>";

echo "insertion des donnees valide ";
//header("location : affiche.php");
  
}else{
    echo "echec insertion";
}

  
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
     <input type="text" name="name" placeholder="entre votre nom" autocomplete="off" ><br><br>

     <label for=""><strong>code:</strong></label>
     <input type="text" name="code" placeholder="entre votre code" autocomplete="off"><br><br>
    
     <!--<label for=""><strong>stock:</strong></label>
     <input type="text" name="stock" min="1"><br><br>-->
     <label for=""><strong>photo:</strong></label>
     <input type="file" name="photo"  id="photo"><br><br>
    <input type="submit" name="submit" class="submit-button" id="tbn" value="Ajouter">
    <input type="reset" class="reset-button" id="bnt2" value="Annuler">

    </form>
</body>
</html>