<?php
session_start();
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
    </head>
    <body>
      <h1>System rejestracji podań osób starających się o pracę</h1>
     <div id="container">  
        <form action="dodaj_umiejetnosci.php" method="post">
            
            <p class="test">  Etap 3: Umiejętności<br> </p>
            <input type="text" name="nazwa_umiejetnosci" placeholder=" Nazwa umiejętności"><br>
            <input type="text" name="poziom_umiejetnosci" placeholder="Poziom umiejętności"><br><br>
            <input class="przycisk" type="submit" value="DODAJ">
            <br>
        
            
            
        
         </form>
         <center><a href="form_szkolenia.php" style="text-decoration: none;"><input  type="submit" value="DALEJ"></a></center>  
       
                <div class="tooltip">Pomoc
             <span class="tooltiptext">Wypisz wszystkie swoje umiejętności oraz ich poziom. Na przykład: język angielski, B2</span>
         </div>
        </div>
    </body>
</html>