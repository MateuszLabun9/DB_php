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
                <br>
                <a class="przycisk" href="form_wyksztalcenie.php">Nowy formularz</a> 
                <br>
                <a class="przycisk"  href="wylogowywanie.php" >Wyloguj</a>
                <br>
                <a class="przycisk" style="background-color: #FF4500;" href="usunuzytkownika.php" >Usuń użytkownika</a>
                
                
                
                  
            </div>
    </body>
</html>