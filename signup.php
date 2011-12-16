<?php
  define("PAGE_TITLE", "Registratseeya, babe");
?>

<html>
  <head><title><?= PAGE_TITLE ?></title></head>
  <body>
    <h2>Zaregeestreeruysya na kursee:</h2>
    <form action="signup_action.php" method="POST">
      Username: <input type="text" name="name" /><br />
      Email: <input type="text" name="email" /><br />
      Password: <input type="password" name="pword[]" /><br />
      Password (again): <input type="password" name="pword[]" /><br />
      <input type="submit" value="BUD' PATSANOM" />
    </form>
  </body>
</html>
