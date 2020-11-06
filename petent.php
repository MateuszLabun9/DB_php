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
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css">
        


    </head>
    <body>
         <h1>System rejestracji podań osób starających się o pracę</h1>
            <div id="container">

                <!--to ciągnie z bazy -->
                <div id="test">
                    <?php echo "<p> Witaj ".$_SESSION['nazwa_uzytkownika']."!  Pomyślnie zalogowałeś się na swoje konto. </p>"; ?>
                </div>
            <!-- zawartość strony sam tekst --> 
                <p class="test"> W następnych etapach będziesz poproszony o uzupełnienie danych takich jak:</p>
                <div class="parent">
                        <ul>
                            <li>wykształcenie</li>
                            <li>doświadczenie zawodowe</li> 
                            <li>umiejętności</li>
                            <li>przebyte szkolenia</li>
                        </ul>
                </div>
                <p class="test"> Aby kontynuować naciśnij przycisk “Dalej”. </p>
                <a class="przycisk" href="wyksztalcenie.php">DALEJ</a> 
                <br>
                <a class="przycisk"  href="usunuzytkownika.php" style=" width: 10%; position:absolute; left: 80%; top: 60%; font-size: 15px; padding: 1%;">Usuń użytkownika</a><!--POPRAW STYL BO SIĘ ROZJEŻDŻA PRZY ZMIANIE ROZDZIELCZOŚCI, https://www.w3schools.com/cssref/pr_class_float.asp-->
                <a class="przycisk"  href="wylogowywanie.php" style=" width: 10%; position:absolute; left: 80%; top: 66%; font-size: 15px; padding: 1%;">Wyloguj</a>
                
                  
            </div>
    </body>
</html>