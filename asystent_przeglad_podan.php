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
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css">
    </head>
    <body>
         <h1>System rejestracji podań osób starających się o pracę</h1>
            <div id="container">
             
        
     
                          
<!-- test pobierania z bazy -->
       <?php
            require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                   
            if($conn->connect_errno!=0){
                 header("Location: index.php?alert=4");//nie laczy z baza
                }  
             else{
                    $sql = "SELECT nazwa_uzytkownika FROM uzytkownik WHERE typ_uzytkownika='petent'";
                  if ($result = mysqli_query($conn, $sql)) {
                    while ($obj = mysqli_fetch_object($result)) {
                        
                  echo '<a href="asystent_przeglad_podan">
                  '.$obj->nazwa_uzytkownika.' <br><br> </a>';
                   
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    }
                  }
                 }

                echo '<a  href="asystent.php" style="text-decoration: none; "> <input  type="submit"  value="Powrót"> </a>';
            ?>
                  
            </div>
    </body>
</html>