<?php
session_start();
if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['typ_uzytkownika']) && $_SESSION['typ_uzytkownika']!='petent'){
    session_unset();
    session_destroy();
    header("Location: index.php?alert=1");
}
?>
<!doctype html>
<html>
    <body>
         <h1>System rejestracji podań osób starających się o pracę</h1>
            <div id="container">
             
              <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
   
                <!--to ciągnie z bazy -->
                <div id="test">
                    <?php echo "<a> Witaj ".$_SESSION['nazwa_uzytkownika']."!  Pomyślnie zalogowałeś się na swoje konto. </a>"; ?>
                </div>
            <!-- zawartość strony sam tekst --> 
                <p class="test">W celu dokonywania zmian w Bazie Danych kliknij w przycisk:</p>
                <a href="phpmyadmin" style="text-decoration: none;"><input  type="submit" value="Baza Danych"></a> 
                 <p class="test">W celu przeglądania informacji PHP:</p>
                <a href=phpinfo.php style="text-decoration: none;"><input  type="submit" value="PHP Info"></a> 
                <br>
                <!-- WYWALIĆ TE INPUTY Z ODNOŚNIKÓW TO JEST USELESS!!!!!!! DO IT EXACTLY LIKE petent.php!!!!!!!! TEN ECHO TEŻ USELESS -->
                <?php echo '<a  href="wylogowywanie.php" style="text-decoration: none; "> <input  type="submit" style="width: 10%; position:absolute; left: 80%; top: 63%; font-size: 15px; padding: 1%;" value="Wyloguj"> </a>'
    ;?>
                  
            </div>
    </body>
</html>