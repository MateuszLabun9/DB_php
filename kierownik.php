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
    <body>
         <h1>System rejestracji podań osób starających się o pracę</h1>
            <div id="container">
             
              <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
   
                <!--to ciągnie z bazy -->
                <div id="test">
                    <?php echo "<a> Witaj ".$_SESSION['nazwa_uzytkownika']."!  Pomyślnie zalogowałeś się na swoje konto. </a>"; ?>
                </div>
            <!-- zawartość strony sam tekst --> 
                <p class="test"> Tutaj znajduje się lista podań do decyzji:</p>
                
                                <br>
                
                <?php echo '<a  href="wylogowywanie.php" style="text-decoration: none; "> <input  type="submit" style="width: 10%; position:absolute; left: 80%; top: 40%; font-size: 15px; padding: 1%;" value="Wyloguj"> </a>'
    ;?>
                  
            </div>
    </body>
</html>