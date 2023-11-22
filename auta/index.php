<?php
//hash : A->B
/*$passe="passe";
echo password_hash($passe , PASSWORD_BCRYPT);
exit;*/
 require 'Database.php';
 require 'util.php' ;
 init_php_session();

if(isset($_POST['valid_connection']))
  if(isset($_POST['form_username']) && !empty($_POST['form_username'])
  && isset($_POST['form_password']) && !empty($_POST['form_password']))
  {
    $username = $_POST['form_username'];
    $password = $_POST['form_password'];
       /* echo "<pre>";
        print_r($_POST);
        echo "</pre>";*/

   $cupUser= $sql->prepare('SELECT * FROM site_users WHERE user_name = :name ');
   $cupUser->execute(array($username));
   $usurs=$cupUser->fetchAll() ;     
       /* $fields = [ ' name' => $username];
        $req = Database :: getInstance()->request($sql, $fields);
        echo '<pre>';
        print_r($req);
        echo '</pre>';*/
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page d'accueil</title>
</head>
<body>
    <h1>page d'accueil</h1>

    <p>bienvenue sur la page d'accueil </p>
    <hr>
    <h2>Se connecter</h2>
    <form method="POST" action="">
        <input type="text" name="form_username" placeholder="Identifiant..">
        <input type="password" name="form_password" placeholder="Mot de passe">
        <input type="submit" name="valid connection" value="connexion">
    </form>
    <nav>
        <ul> 
            <li><a href="index.php">Accueil</a></li>
            <li><a href="content.php">Page</a></li>
        </ul>
    </nav>
</body>
</html>