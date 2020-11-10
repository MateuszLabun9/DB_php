<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Rejestracja do systemu rewizji CV</title>
    <link rel="stylesheet" href="style/logowanie_style.css">
</head>
    
    <body>
        <h2>System rejestracji podań osób starających się o pracę</h2>
        <div id="container">
        <form action="rejestruj.php" method="post">
            <br>
            
            <h1>Rejestracja</h1>
            
            <input type="text" name="nazwa_uzytkownika" placeholder="Nazwa użytkownika"><br>
            
            <input type="password" name="haslo" placeholder="Hasło">
            <br>
            
           
            
            <input type="submit" value="Zarejestruj się!"><br>
        </form>
            <center><p><a href="index.php">Masz już konto? Zaloguj się!</a></p>
                <?php
            
            if(isset($_GET['alert'])){
                switch($_GET['alert']){
                    case 1:
                        echo "<p>Proszę poprawnie uzupełnić dane logowania!</p>";
                        break;
                    case 2:
                        echo "<p>Konto użytkownika zostało usunięte lub wyłączone!</p>";
                        break;
                    case 3:
                        echo "<p>Błąd obsługi zapytania!</p>";
                        break;
                    case 4:
                        echo "<p>Brak połączenia z bazą danych!</p>";
                        break;
                    case 5:
                        echo "<p>Konto utworzono pomyślnie!</p>";
                        break;
                    case 6:
                        echo "<p>Konto o podanym loginie już istnieje!</p>";
                        break;
                }
            }
            
            ?>
            </center>
        </div>
    </body>
</html>