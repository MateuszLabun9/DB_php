<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie do systemu rewizji CV</title>
    <link rel="stylesheet" href="style/logowanie_style.css">
    <body>
        <h2>System rejestracji podań osób starających się o pracę</h2>
        <div id="container">
        <form action="logowanie.php" method="post">
           <br>
            
            <h1>Logowanie</h1>
            
            <!-- blok loginu --> 
             <input type="text" name="nazwa_uzytkownika" placeholder="login" onfocus="this.placeholder=''" onblur="this.placeholder='login'"><br>
            
            <!-- blok hasła --> 
            <input type="password" name="haslo" placeholder="hasło"
                   onfocus="this.placeholder=''" onblur="this.placeholder='hasło'"><br>
            
            <!-- blok logowania -->
            <input type="submit" value="LOGIN"><br>
             
        </form>
           <p><a href="rejestracja.php" >Nie masz jeszcze konta? Zarejestruj się!</a></p>
    </div>
    </body>
    </html>