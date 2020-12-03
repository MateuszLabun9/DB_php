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
                    $sql = "SELECT w.* FROM umiejetnosci w, uzytkownik u WHERE u.id_uzytkownika=w.id_uzytkownika AND u.nazwa_uzytkownika='".$_SESSION['nazwa_uzytkownika']."';";
                    if($result = $conn->query($sql)){
                        $podania = $result->num_rows;
                        if($podania>0){
                            echo '<table><tr><th>Nazwa umiejętności</th><th>Poziom umiejętności</th></tr>';
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<tr>
                                <td>'.$obj->nazwa_umiejetnosci.'</td>
                                <td>'.$obj->poziom_umiejetnosci.'</td>
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
         
        <form action="dodaj_umiejetnosci.php" method="post">
            
            <p class="test">  Etap 3: Umiejętności<br> </p>
            <input type="text" name="nazwa_umiejetnosci" placeholder=" Nazwa umiejętności"><br>
            <select name="poziom_umiejetnosci" id="znacznik_select">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select><br><br>
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