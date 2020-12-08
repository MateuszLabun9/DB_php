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
                    echo '<h1>Podstawowe informacje</h1>';
                    $sql = "SELECT w.* FROM podanie w, uzytkownik u WHERE u.id_uzytkownika=w.id_uzytkownika AND u.nazwa_uzytkownika='".$_SESSION['nazwa_uzytkownika']."';";
                    if($result = $conn->query($sql)){
                        $podania = $result->num_rows;
                        if($podania>0){
                            echo '<table><tr><th>Imię</th><th>Nazwisko</th><th>Data urodzenia</th><th>Płeć</th></tr>';
                            
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<tr>
                                <td>'.$obj->imie.'</td>
                                <td>'.$obj->nazwisko.'</td>
                                <td>'.$obj->data_urodzenia.'</td>   
                                <td>'.$obj->plec.'</td> 
                                </tr>';
                            }
                            echo '</table>';
                        }
                    }
                    echo '<h1>Wykształcenie</h1>';
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
                    echo '<h1>Doświadczenie zawodowe</h1>';
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
                    echo '<h1>Umiejętności</h1>';
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
                    echo '<h1>Przebyte szkolenia</h1>';
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
                    echo '<h1>Załączone pliki:</h1>';
                }
         
         //zmieniamy etap rekrutacji na 1 po wypelnieniu formularza przez petenta 
         
             $sql = "UPDATE podanie u SET etap_rekrutacji = '1'  WHERE u.id_uzytkownika='".$_SESSION['id_uzytkownika']."';";
                  $conn->close();

         
         ?>
    <a href="podglad_decyzji.php" class="przycisk" style="text-decoration: none;">DALEJ</a>
         
        </div>
         
    </body>
</html>