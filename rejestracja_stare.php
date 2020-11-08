<!doctype html>
<html>
    <head>
    </head>
    <body>
        <form action="rejestruj.php" method="post">
            ZAREJESTRUJ SIEM<br>
            LOGIN <input type="text" name="nazwa_uzytkownika"><br>
            <!--EMAIL <input type="email" name="email"><br>-->
            HASLO <input type="password" name="haslo"><br>
            IMIE <input type="text" name="imie"><br>
            NAZWISKO <input type="text" name="nazwisko"><br>
            DATA URODZENIA <input type="date" name="data_urodzenia"><br>
            PŁEĆ <input type="radio" name="gender" value="male">
                 <label for="male">MĘSZCZYSNA</label>
                 <input type="radio" name="gender" value="female">
                 <label for="female">KOBIETA</label><br>
            <input type="submit" value="Rejestruj"><br>
        </form>
        <a href="index.php">MASZ JUZ KONTO? ZALOGUJ SIEM!</a>
    </body>
</html>