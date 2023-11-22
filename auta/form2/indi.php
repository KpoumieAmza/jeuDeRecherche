<?php

session_start();

if(isset($_POST['button-valider'])) {
    //si on clique sur le boutton alor
     //nous allons verifier des information du formulaire
  if(isset($_POST['email']) && isset($_POST['mdp'])){

    //connexion a la base de donne
    //require_once('../form/connection.php');
    $nom_seveur="localhost";
    $utilisateur="root";
    $mot_passe="";
    $dbname="inserto";
    $con=mysqli_connect($nom_seveur,$utilisateur,$mot_passe , $dbname);
    //NOUS allons mettre l'email et le mot de passe dans les variables
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $erreur="";
    
    //requete de seclection de tous les utilisateurs
    
    $req=mysqli_query($con ,"SELECT * FROM  email WHERE email= '$email' AND mdp ='$mdp' ");
    $num_ligne= mysqli_num_rows($req);//compte les lignes ayant rapport a la requette
       if($num_ligne > 0){
        header("location :bienvenue.php");

        $_SESSION['email']=$email;
       }else{ // si non
      $erreur= "Adresse email ou mot de passe incorectes !";
       }
    }
  
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
    <h1>connexion</h1>
    <?php
    if(isset($erreur)){//si la variable erreur existe , on sffiche le contenue
        echo "<p class= 'erreur' >" .$erreur. "</p>";
    }
    
    ?>
    <form method="post" action="" >
        <input type="text" name="email" placeholder="e-mail">
        <input type="password" name="mdp" placeholder="mot de pass">
        <input type="submit" value="valider" name="button-valider">
    </form>
 </section>
</body>
</html>