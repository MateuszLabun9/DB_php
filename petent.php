<?php
session_start();
if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['typ_uzytkownika']) && $_SESSION['typ_uzytkownika']!='petent'){
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>
<!doctype html>
<html>
    <head>
    </head>
    <body>
        <?php
        echo "Witaj ".$_SESSION['nazwa_uzytkownika'].". Zalogowano jako ".$_SESSION['typ_uzytkownika'].".";
        echo '<a  href="wylogowywanie.php">Wyloguj</a>';
        ?>
    </body>
</html>