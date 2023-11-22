<?php
//on definir des constanet
define('DBHOST', 'localhost');
define('DBNAME', 'auta');
define('DBUSER', 'root');
define('DBPASS', '');
//on se connecte
$nds ="mysql:dbname=".DBNAME.";host=".DBHOST;
try{
 $db= new PDO($nds,DBUSER,DBPASS);
 //echo "on est connecte";
}catch(PDOException $e){
    die('erreur :'.$e->getMessage());

}
?>