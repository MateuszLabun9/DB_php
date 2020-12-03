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
         
         <?php
         
              require_once "connect.php";

                $conn = @new mysqli($host, $db_user, $db_password, $db_name);

                if($conn->connect_errno!=0){
                    header("Location: petent.php?alert=4");//nie laczy z baza
                }
                else{
                    $sql = "SELECT w.* FROM szkolenia w, uzytkownik u WHERE u.id_uzytkownika=w.id_uzytkownika AND u.nazwa_uzytkownika='".$_SESSION['nazwa_uzytkownika']."';";
                    if($result = $conn->query($sql)){
                        $podania = $result->num_rows;
                        if($podania>0){
                            echo '<table><tr><th>Nazwa szkolenia</th><th>Rok rozpoczęcia szkolenia</th></tr>';
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<tr>
                                <td>'.$obj->nazwa_szkolenia.'</td>
                                <td>'.$obj->rok_rozp_s.'</td>
                                </tr>';
                            }
                            echo '</table>';
                        }
                    }
                    else{
                        header("Location: petent.php?alert=3");//blad obslugi zapytania
                    }
                }
         ?>
         
        <form action="dodaj_szkolenia.php" method="post">
            
            <p class="test">Etap 4: Przebyte szkolenia<br></p>
            <input type="text" name="nazwa_szkolenia" placeholder="Nazwa szkolenia"><br>
            <input type="text" name="rok_rozp_s" placeholder=" Rok rozpoczęcia"><br><br>
            <input class="przycisk" type="submit" value="DODAJ">
            <br>
            
           
        
        </form>
         <center><a href="form_wymagane_dokumenty.php" style="text-decoration: none;"><input  type="submit" value="DALEJ"></a></center> 
      
        <div class="tooltip">Pomoc
             <span class="tooltiptext">Wypisz wszystkie szkolenia które odbyłeś, uwzględnij rok rozpoczęcia.</span>
         </div>
        </div>
    </body>
</html>