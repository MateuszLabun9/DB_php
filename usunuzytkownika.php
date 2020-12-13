<?php
session_start();
require_once "uzytkownik.php";


if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['typ_uzytkownika']) && $_SESSION['typ_uzytkownika']!='petent'){
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>


<html>
    <head>
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
  
    </head>
    <body>
      <h1>Usuwanie konta</h1>
     <div id="container">   
         
         <?php
         
         ?>
         
        <form action="usuwaj.php" method="post">
            <p class="test"> Potwierdź usuwanie konta hasłem<br></p>
            <input type="password" name="haslo" placeholder="Potwierdź hasło"><br>
            <br>
            <input type="submit" value="USUŃ KONTO">
        </form>
        </div>
    </body>
</html>
