<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
    </head>
    <body>
      <h1>System rejestracji podań osób starających się o pracę</h1>
     <div id="container">  
        <form action="szkolenia.php" method="post">
            
            <p class="test">Etap 4: Przebyte szkolenia<br></p>
            <input type="text" name="nazwa_szkolenia" placeholder="Nazwa szkolenia"><br>
            <input type="text" name="rok_rozp_s" placeholder=" Rok rozpoczęcia"><br>
            <br>
            
           
        
        </form>
                   <a href=wymagane_dokumenty.php style="text-decoration: none;"><input  type="submit" value="DALEJ"></a> 
         <!-- WYWALIĆ TE INPUTY Z ODNOŚNIKÓW TO JEST USELESS!!!!!!! DO IT EXACTLY LIKE petent.php!!!!!!!! -->
        <div class="tooltip">Pomoc
             <span class="tooltiptext">Wypisz wszystkie szkolenia które odbyłeś, uwzględnij rok rozpoczęcia.</span>
         </div>
        </div>
    </body>
</html>