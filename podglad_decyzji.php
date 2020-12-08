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
                    header("Location: petent.php?alert=4");//nie laczy z baza
                }
                else{
                    $sql = "SELECT p.* FROM podanie p, uzytkownik u WHERE u.id_uzytkownika=p.id_uzytkownika AND u.nazwa_uzytkownika='".$_SESSION['nazwa_uzytkownika']."';";
                    if($result = $conn->query($sql)){
                        $podania = $result->num_rows;
                        if($podania>0){
                            $row = $result->fetch_assoc();
                           
                           if ($row['etap_rekrutacji'] == 1) echo '<a>Twój formularz oczekuje na rozpatrzenie.</a><br><br>';
                            
                            else if ($row['etap_rekrutacji'] == 2) {
                                
                                echo '<a>Gratulacje! zostałeś zaproszony na rozmowę kwalifikacyjną </a><br><br>';
                            
                                echo '<a href="akceptacja_rozmowy_przez_petenta.php"     class="przycisk" style="background-color=#ff7f00; ">akceptuj</a>';
                            }
                             else if ($row['etap_rekrutacji'] == 3) {
                                
                                echo '<a>Rekruter wkrótce się z tobą skontaktuje. Prosimy o cierpliwość.</a><br><br>';
                            
                             }
                                
                            
                        }
                        
                        else header("Location: petent.php?alert=9");//nie wyslano podania
                    }
                    else{
                        header("Location: petent.php?alert=3");//blad obslugi zapytania
                    }
                }
              
              ?>
         </form>
         <br>
                <a href="finalizacja.php" class="przycisk" style="text-decoration: none;">Podgląd podania</a><br>
                <a href="petent.php" class="przycisk" style="text-decoration: none;">Powrót do strony głównej</a>
        </div>
         
    </body>
</html>