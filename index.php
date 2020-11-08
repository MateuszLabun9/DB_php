<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie do systemu rewizji CV</title>
    <link rel="stylesheet" href="style/logowanie_style.css">
</head>
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
            
            <?php
            
            if(isset($_GET['alert'])){
                switch($_GET['alert']){
                    
                    case 1:
                        echo '<span style="color:#DC143C; font-family: sans-serif, verdana;font-size:16px;">
                        
                        Proszę poprawnie uzupełnić dane logowania!
                        
                        </span>';
                        break;
                    case 2:
                        echo '<span style="color:#DC143C; font-family: sans-serif, verdana;font-size:16px;">
                        
                        Konto użytkownika zostało usunięte lub wyłączone!
                        
                        </span>';
                        break;
                    case 3:
                        echo '<span style="color:#DC143C; font-family: sans-serif, verdana;font-size:16px;">
                        
                        Błąd obsługi zapytania!
                        
                        </span>';
                        break;
                    case 4:
                        echo '<span style="color:#DC143C; font-family: sans-serif, verdana;font-size:16px;">
                        
                        Brak połączenia z bazą danych!
                        
                        </span>';
                        break;
                    case 5:
                        echo '<span style="color:#DC143C; font-family: sans-serif, verdana;font-size:16px;">
                        
                        Konto utworzono pomyślnie!
                        
                        </span>';
                        break;
                    case 6:
                        echo '<span style="color:#DC143C; font-family: sans-serif, verdana;font-size:16px;">
                        
                        Konto o podanym loginie już istnieje!
                        
                        </span>';
                        break;
                }
            }
            ?>
    </div>
    </body>
    </html>