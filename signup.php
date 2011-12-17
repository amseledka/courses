<?php
  define("PAGE_TITLE", "Registratseeya, babe");
?>

<html>
  <head><title><?= PAGE_TITLE ?></title></head>
  <body>
    <h2>Zaregeestreeruysya na kursee:</h2>
    <form action="signup_action.php" method="POST">
      Email: <input type="text" name="email" /><br />
      Password: <input type="password" name="password" /><br />
      <input type="submit" value="BUD' PATSANOM" />
    </form>

    <a href="index.php">Obratno, telka!</a>
  
  </body>
</html>
