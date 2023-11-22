
<?php
session_start();

require_once "connection.php";

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <?Php
    $affiche=$db->query('SELECT * FROM `site_users`');
    while($aff=$affiche->fetch()){
        ?>
   
    <div class="article" style="border: 1px solid black ;" >
            <h1> <?= $aff['name'];?></h1>
            <p> <?=$aff['code'];?></p>
            <p><?=$aff['photo'];?></p>
         <a href="sup.php?stock=<?=$aff['stock'];?>">
            <button style="color:black; background-color:yellow;  margin-bottom: 10px;">supprimer  </button>
            
        </a>

        <a href="modif.php?stock=<?=$aff['stock']; ?>">
            <button style="color:black; background-color: red;  margin-bottom: 10px;">modifier </button>
        
        </a>

        </div>
        <br>
        <?php
       }
    ?>
  
 
</body>
</html>