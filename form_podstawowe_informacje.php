<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Rejestracja do systemu rewizji CV</title>
    <link rel="stylesheet" href="style/style_glowny.css">
</head>
    
    <body>
        <h2>System rejestracji podań osób starających się o pracę</h2>
        <div id="container">
        <form action="dodaj_podstawowe_informacje.php" method="post">
            <br>
            
            <h1>Podstawowe informacje</h1>
            <select name="plec" id="znacznik_select">
                <option>Mężczyzna</option>
                <option>Kobieta</option>
                <option>Inne</option>
            </select><br>
            
            
            <input type="text" name="imie" placeholder="Imię">
            <br>
            
            <input type="text" name="nazwisko" placeholder="Nazwisko">
            <br>
            
            <input type="date" name="data_urodzenia" placeholder="Data urodzenia"
            onfocus="this.placeholder=''" onblur="this.placeholder='Data urodzenia'">
            <br>
            <br>
             <input class="przycisk" type="submit" value="DALEJ">
             <br>
            
        </form>
             
            <div class="tooltip">Pomoc
                <span class="tooltiptext">Pamiętaj o poprawnym uzupełnieniu wszystkich rubryk dotyczących twoich danych osobistych.</span>
         </div>
        </div>
    </body>
</html>