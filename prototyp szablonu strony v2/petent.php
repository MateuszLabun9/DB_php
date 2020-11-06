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
                <a href=wyksztalcenie.php style="text-decoration: none;"><input  type="submit" value="DALEJ"></a> 
                 <!--<?php echo '<a  href="wylogowywanie.php">Wyloguj</a>';?>-->
                  
            </div>
    </body>
</html>