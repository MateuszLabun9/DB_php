<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
        <script src="js/script.js"></script>
    </head>
    <body>
      <h1>System rejestracji podań osób starających się o pracę</h1>
     <div id="container">  
          <form action="plik.php" method="post" enctype="multipart/form-data">
         
            <div id="separator">  
              <input type="file" name="plik" id="label" style="visibility: hidden;">
              <label onclick="tekst()" for="label"> DODAJ PLIK</label>  
              <span  id="file-chosen"></span>
              <br>
              <!-- dodac do htdocs katalog wyslane dokumenty -->
              <input type="submit" name="submit" value="PRZEŚLIJ" >
             
            </div>  
              
         </form>
         <center><a href=finalizacja.php style="text-decoration: none;"><input  type="submit" value="DALEJ"></a></center> 
        </div>
         
    </body>
</html>