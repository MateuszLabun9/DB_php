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
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
    </head>
    <body>
      <h1>System rejestracji podań osób starających się o pracę</h1>
     <div id="container">  
          <form action="finalizacja.php" method="post" enctype="multipart/form-data">
              
              
              <?php
              
                  require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                   
           
            if($conn->connect_errno!=0){
                 header("Location: index.php?alert=4");//nie laczy z baza
                }  
            
            
    
             $sql = "UPDATE podanie u SET etap_rekrutacji = '3'  WHERE u.id_uzytkownika='".$_SESSION['id_uzytkownika']."';";
               
            echo '<a> Rekruter wkrótce się z tobą skontaktuje. Prosimy o cierpliwość.</a>';
               
            if ($conn->query($sql) === TRUE) {}
                $conn->close();
                
                
              
              ?>
         </form>
         <br>
            
                <a href="petent.php" class="przycisk" style="text-decoration: none;">Powrót do strony głównej</a>
        </div>
         
    </body>
</html>