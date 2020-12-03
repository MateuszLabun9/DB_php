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
                    $sql = "SELECT w.* FROM wyksztalcenie w, uzytkownik u WHERE u.id_uzytkownika=w.id_uzytkownika AND u.nazwa_uzytkownika='".$_SESSION['nazwa_uzytkownika']."';";
                    if($result = $conn->query($sql)){
                        $podania = $result->num_rows;
                        if($podania>0){
                            echo '<table><tr><th>Nazwa szkoły</th><th>Poziom</th><th>Rok Rozpoczęcia</th><th>Rok zakończenia</th></tr>';
                            
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<tr>
                                <td>'.$obj->nazwa_szkoly.'</td>
                                <td>'.$obj->poziom.'</td>
                                <td>'.$obj->rok_rozpoczecia.'</td>   
                                <td>'.$obj->rok_zakonczenia.'</td> 
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
         
        <form action="dodaj_wyksztalcenie.php" method="post">
            <p  class="test"> Etap 1: Wykształcenie<br></p>
            <select name="poziom" id="znacznik_select">
                <option>Podstawowe</option>
                <option>Zawodowe</option>
                <option>Średnie</option>
                <option>Techniczne</option>
                <option>Wyższe</option>
            </select><br>
            <input type="text" name="nazwa_szkoly" placeholder="Nazwa Szkoły"><br>
            <input type="number" name="rok_rozp_w" placeholder="Rok rozpoczęcia"><br>
            <input type="number" name="rok_zak_w" placeholder="Rok zakończenia"><br><br>
            <input class="przycisk" type="submit" value="DODAJ">
            <br>
            
       
            
        </form>
         <center> <a href="form_doswiadczenie.php" style="text-decoration: none;"><input  type="submit" value="DALEJ"></a> </center>
         
         
         <div class="tooltip">Pomoc
             <span class="tooltiptext">Wpisz poziom swojego wykształcenia, dokładną nazwę szkoły oraz lata w których się uczyłeś.</span>
         </div>
         
        </div>
    </body>
</html>