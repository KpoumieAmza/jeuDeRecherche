<?php
 session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
    $pseudo_par_defaut = "admin";
    $mdp_par_defaut="admin1234";

    $pseudo_saisi=htmlspecialchars($_POST['pseudo']);
    $mdp_saisi=htmlspecialchars($_POST['mdp']);

      if($pseudo_saisi==$pseudo_par_defaut AND $mdp_saisi==$mdp_par_defaut){
        $_SESSION['mdp'] = $mdp_saisi;
        header('location: index.php');

      }else{
        echo "votre mot de passe ou pseudo est incorrect";
      }
    }else{
        echo "veuille complete tous les champs..";
    }
}




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connection</title>
</head>
<body>

<form method="post" action="" align="center">
   <input type="text" name="pseudo" autocomplete="off" placeholder="nom utilisateur par de faut">
   <br>
   <input type="password" name="mdp" placeholder="mot de passe par de faut">
   <br><br>
   <input type="submit" name="valider">
</form>
    
</body>
</html>