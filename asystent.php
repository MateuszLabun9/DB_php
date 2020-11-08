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
    <head>
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css">
    </head>
    <body>
         <h1>System rejestracji podań osób starających się o pracę</h1>
            <div id="container">
             
              
   
                <!--to ciągnie z bazy -->
                <div id="test">
                    <?php echo "<a> Witaj ".$_SESSION['nazwa_uzytkownika']."!  Pomyślnie zalogowałeś się na swoje konto. </a>"; ?>
                </div>
            <!-- zawartość strony sam tekst --> 
                <p class="test"> Tutaj znajduje się lista podań do zweryfikowania:</p>
                                <br>

                <?php echo '<a  href="wylogowywanie.php" style="text-decoration: none; "> <input  type="submit"  value="Wyloguj"> </a>'
    ;?>
                  
            </div>
    </body>
</html>