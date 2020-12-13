<?php
session_start();
if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['typ_uzytkownika']) || $_SESSION['typ_uzytkownika']!='asystent'){
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
            <!--to ciągnie z bazy -->
            <div id="test">
                <?php echo "<a> Witaj ".$_SESSION['nazwa_uzytkownika']."!  Pomyślnie zalogowałeś się na swoje konto. </a>"; ?>        
            </div>
            <!-- zawartość strony sam tekst --> 
                <p class="test"> Tutaj znajduje się lista podań do zweryfikowania:</p>
            <br>
            <div> 
            <table>
                <tr>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Podgląd</th>
                    <th>Zaproszenie</th>
                    <th>Ocena petenta</th>
                    <th>Opinia</th>
                    <th>Akceptacja po rozmowie </th>
                    <th>Odrzuć rekruta</th>
                </tr>
              
            <?php 
                    require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                 
            if($conn->connect_errno!=0){
                 header("Location: index.php?alert=4");//nie laczy z baza
                }  
             else{
                    $sql = "SELECT uzytkownik.typ_uzytkownika, uzytkownik.id_uzytkownika, uzytkownik.nazwa_uzytkownika, podanie.etap_rekrutacji, podanie.ocena_rekruta, podanie.nazwisko, podanie.imie FROM uzytkownik JOIN podanie ON uzytkownik.id_uzytkownika=podanie.id_uzytkownika";
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      
                    while ($obj = mysqli_fetch_object($result)) {
                 //tabela z odpowiednimi przyciskami etc.       
                  echo     '<tr>
                                
                                <td>'.$obj->imie.'</td>
                                
                                <td>'.$obj->nazwisko.'</td>
                                
                                
                                
                                <td><a href="asystent_przeglad_podan.php?uzytkownik='.$obj->id_uzytkownika.'">Formularz</a></td>
                                
                                 <td>';
                                
                                    if($obj->etap_rekrutacji==1)  {     
                                        echo '<a href = zaproszenie_do_rozmowy.php?uzytkownik='.$obj->id_uzytkownika.'>Wyślij zaproszenie!</a>';
                                }
                                else if($obj->etap_rekrutacji==2) echo 'Wysłano';
                                
                            echo '</td>';    
                            echo '<td>'; 
                                    if($obj->etap_rekrutacji==3 ){
                                          echo  '<form method="POST">  <center> <select name="Ocena" id="znacznik_select1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                </select></center>
                                                <button name="update2" value="'.$obj->id_uzytkownika.'">Zaktualizuj ocenę</button></form>';
                                    }
                        echo '</td>';
                        
                        echo '<td>';
                                if ($obj->etap_rekrutacji==3){
                                    
                                    echo '<form method="POST">
                                    <input type="text1" name="Opinia" placeholder="Twoja opinia">
                                    <button name="update3" value="'.$obj->id_uzytkownika.'">Zatwierdź</button>
                                    </form>';
                                        
                                    
                                }
                        
                        
                        
                        echo '</td>';
                            echo  '<td>';
                        
                                    if($obj->etap_rekrutacji==3 && $obj->ocena_rekruta != 0){
                                    
                                    echo  '<form method="POST"><button name="update1" value="'.$obj->id_uzytkownika.'">Wyślij do kierownika</button></form>';
                                        }
                        
                            echo '</td>';      
                        
                    
                        if($obj->etap_rekrutacji == 8) echo '<td>Zachowano dla przyszłych rekrutacji</td></tr>';
                        else{
                        echo   '  <form method="POST">
                                <td><button name="update" value="'.$obj->id_uzytkownika.'">Usuń</button></td>
                                </form>
                                
                    
                        </tr>';
                       }
                    
                    }
                      
                       if(isset($_POST['update'])) // when click on Update button
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '6' WHERE u.id_uzytkownika=".$_POST['update'].";");
                             if ($conn->query($edit) === TRUE) {}
                            
                                }
                       if(isset($_POST['update1'])) // when click on Update button
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '4' WHERE u.id_uzytkownika=".$_POST['update1'].";");
                             if ($conn->query($edit) === TRUE) {}
                            
                                }
                          if(isset($_POST['update2'])) // when click on Update button
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET ocena_rekruta = ".$_POST['Ocena']." WHERE u.id_uzytkownika=".$_POST['update2'].";");
                             if ($conn->query($edit) === TRUE) {}
                          }
                       if(isset($_POST['update3'])) // when click on Update button
                                {
                             
                             $edit = mysqli_query($conn, "UPDATE podanie SET uzasadnienie_decyzji = '".$_POST['Opinia']."' WHERE id_uzytkownika=".$_POST['update3'].";");
                             if ($conn->query($edit) === TRUE) {}
                                }
                  }
                 }
                $conn -> close();
              ?>
                      
                         
            </table>
            </div>
            <br>

          <?php
    
                echo '<a  href="wylogowywanie.php" style="text-decoration: none; "> <input  type="submit"  value="Wyloguj"> </a>';
            ?>  
                 
            </div>
    
   
    </body>
</html> 