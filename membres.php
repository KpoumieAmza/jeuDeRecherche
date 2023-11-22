<?phP
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
    <title>afficher  les membres</title>
</head>
<body>
    <!--afficher tous membres-->
      <?php
         $recupUser=$bdd->query('SELECT * FROM menbres');
         while( $users=$recupUser->fetch()){
           
             ?>
             <p><?=$users['pseudo'];?><a href="bannir.php?id=<?=$users['id']; ?>" style="color:red;
             text-decoration: none";>Bannir le membre</a></p>
             <?php
         }

      ?>

    <!--fin-->
</body>
</html>