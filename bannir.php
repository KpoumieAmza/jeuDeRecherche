<?php
  session_start();
  $bdd= new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
  if(isset($_GET['id'] )AND !empty( $_GET['id'])){
        $getid = $_GET['id'];
        $recupUser=$bdd->prepare('SELECT * FROM menbres WHERE id=?');
        $recupUser->execute(array($getid));
        if($recupUser->rowCount() >0){

            $bannirUsers =$bdd->prepare('DELETE FROM menbres WHERE id =?' );
            $bannirUsers->execute(array($getid));
            header('Locotion: membres.php');

        }else{
             echo " Auccun membre n'a ete trouve";
        }
  }else{
    echo "identifiant n'a pas ete recupere";
  }
?>