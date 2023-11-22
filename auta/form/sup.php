<?php
   require_once "connection.php";
   if(isset($_GET['stock']) AND !empty($_GET['stock'])){
    $getStock=$_GET['stock'];
    $sup=$db->prepare("SELECT * FROM site_users WHERE stock = ? ");
    $sup->execute(array($getStock));
  
   if($sup->rowCount() >0){
    $delect=$db->prepare("DELETE FROM site_users WHERE stock = ? ");
    $delect->execute(array($getStock));
    header('location: affiche.php');
   }else{
    echo "erreur de suppresion";
   }
}else{
    echo "Aucun identifiant trouver";
   }

?>