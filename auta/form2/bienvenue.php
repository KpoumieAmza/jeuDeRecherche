<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
      echo "<P class = 'message'> bonjour"  .     $_SESSION ['email'] ."</p>" ;
    ?>
</body>
</html>