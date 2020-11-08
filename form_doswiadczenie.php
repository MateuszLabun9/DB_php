<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
    </head>
    <body>
      <h1>System rejestracji podań osób starających się o pracę</h1>
     <div id="container">  
         
        <form action="doswiadczenie.php" method="post">
            
            <p class="test">    Etap 2: Doświadczenie zawodowe<br></p>
            <input type="text" name="nazwa_firmy" placeholder="Nazwa Firmy"><br>
            <input type="text" name="stanowisko" placeholder="Stanowisko"><br>
            <input type="number" name="rok_rozp_d" placeholder=" Rok rozpoczęcia"><br>
            <input type="number" name="rok_rozp_d" placeholder="Rok zakończenia"><br>
            <br>
            <br>
            
        
        </form>
               <a href="form_umiejetnosci.php" style="text-decoration: none;"><input  type="submit" value="DALEJ"></a>    
         <!-- WYWALIĆ TE INPUTY Z ODNOŚNIKÓW TO JEST USELESS!!!!!!! DO IT EXACTLY LIKE petent.php!!!!!!!! -->
        
        
        <div class="tooltip">Pomoc
             <span class="tooltiptext">Wpisz nazwy firm w których pracowałeś, uwzględnij stanowisko oraz rok rozpocząecia i zakończenia.</span>
         </div>
         </div>
    </body>
</html>