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
             <?php 
            
                if(!isset($_GET['uzytkownik'])){
                    echo '<p>Nie wybrano użytkownika</p>';
                    
                }
                else{
                   
                    require_once "connect.php";
                 $conn = @new mysqli($host, $db_user, $db_password, $db_name);

                if($conn->connect_errno!=0){
                    header("Location: asystent.php?alert=4");//nie laczy z baza
                }
                else{
                    echo '<h1>Podstawowe informacje</h1>';
                     $sql = "SELECT * FROM podanie WHERE id_uzytkownika=".$_GET['uzytkownik'].";";
;
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
                     $sql = "SELECT * FROM wyksztalcenie WHERE id_uzytkownika=".$_GET['uzytkownik'].";";
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
                     $sql = "SELECT * FROM doswiadczenie WHERE id_uzytkownika=".$_GET['uzytkownik'].";";
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
                      $sql = "SELECT * FROM umiejetnosci WHERE id_uzytkownika=".$_GET['uzytkownik'].";";
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
                     $sql = "SELECT * FROM szkolenia WHERE id_uzytkownika=".$_GET['uzytkownik'].";";
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
            }
         ?>
        <a href="asystent.php" class="przycisk" style="text-decoration: none;">POWRÓT</a> 
                
     
     
                  
            </div>
    </body>
</html>