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
                    $sql = "SELECT w.* FROM doswiadczenie w, uzytkownik u WHERE u.id_uzytkownika=w.id_uzytkownika AND u.nazwa_uzytkownika='".$_SESSION['nazwa_uzytkownika']."';";
                    if($result = $conn->query($sql)){
                        $podania = $result->num_rows;
                        if($podania>0){
                            echo '<table><tr><th>Nazwa firmy</th><th>Stanowisko</th><th>Rok Rozpoczęcia</th><th>Rok zakończenia</th></tr>';
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<tr>
                                <td>'.$obj->nazwa_firmy.'</td>
                                <td>'.$obj->stanowisko.'</td>
                                <td>'.$obj->rok_rozp_d.'</td>   
                                <td>'.$obj->rok_zak_d.'</td> 
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
         
        <form action="dodaj_doswiadczenie.php" method="post">
            
            
            
            <p class="test">    Etap 2: Doświadczenie zawodowe<br></p>
            <input type="text" name="nazwa_firmy" placeholder="Nazwa Firmy"><br>
            <input type="text" name="stanowisko" placeholder="Stanowisko"><br>
            <input type="number" name="rok_rozp_d" placeholder=" Rok rozpoczęcia"><br>
            <input type="number" name="rok_zak_d" placeholder="Rok zakończenia"><br><br>
            <input class="przycisk" type="submit" value="DODAJ">
            <br>
            
        
        </form>
         <center><a href="form_umiejetnosci.php" style="text-decoration: none;"><input  type="submit" value="DALEJ"></a></center>    
       
        
        
        <div class="tooltip">Pomoc
             <span class="tooltiptext">Wpisz nazwy firm w których pracowałeś, uwzględnij stanowisko oraz rok rozpocząecia i zakończenia.</span>
         </div>
         </div>
    </body>
</html>