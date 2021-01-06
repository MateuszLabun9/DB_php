<?php
session_start();
if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['typ_uzytkownika']) && $_SESSION['typ_uzytkownika']!='petent'){
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>
<!doctype html>
<html>
    <body>
         <h1>System rejestracji podań osób starających się o pracę</h1>
            <div id="container">
             
              <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
   
                <!--to ciągnie z bazy -->
                <div id="test">
                    <?php echo "<a> Witaj ".$_SESSION['nazwa_uzytkownika']."!  Pomyślnie zalogowałeś się na swoje konto. </a>"; ?>
                </div>
            <!-- zawartość strony sam tekst --> 
              
                <br>             
                     
                 <?php 
                    require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                
            if($conn->connect_errno!=0){
                 header("Location: index.php?alert=4");//nie laczy z baza
                }  
             else{
                  $sql = " SELECT plec, COUNT(*) AS 'mezczyzni' FROM podanie WHERE plec = 'M' ";
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      echo '<h1>Płeć</h1>
                            <table>
                            <tr>
                                <th>Mężczyźni</th>
                              
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->mezczyzni.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                  $sql = "  SELECT plec, COUNT(*) AS 'kobiety' FROM podanie WHERE plec = 'K'  ";
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      echo '
                            <table>
                            <tr>
                                <th>Kobiety</th>
                              
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->kobiety.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                  $sql = " SELECT plec, COUNT(*) AS 'inni' FROM podanie WHERE plec = 'I' ";
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      echo '
                            <table>
                            <tr>
                                <th>Inni</th>
                              
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->inni.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                  $sql = "  SELECT MIN(ROUND(FLOOR(DATEDIFF('2021/01/06', data_urodzenia))/365.25)) AS 'minimum' FROM podanie ";
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      echo '<h1>Wiek</h1>
                            <table>
                            <tr>
                                <th>Minimalny wiek</th>
                              
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->minimum.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                  $sql = "  SELECT MAX(ROUND(FLOOR(DATEDIFF('2021/01/06', data_urodzenia))/365.25)) AS 'maximum' FROM podanie ";
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      echo '
                            <table>
                            <tr>
                                <th>Maksymalny wiek</th>
                              
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->maximum.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                  $sql = " SELECT ROUND(AVG(FLOOR(DATEDIFF('2021/01/06', data_urodzenia)))/365.25) AS 'sredni' FROM podanie";
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      echo '
                            <table>
                            <tr>
                                <th>Średni wiek</th>
                              
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->sredni.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                    $sql = "SELECT COUNT(poziom) AS 'Podstawowe' FROM wyksztalcenie WHERE poziom = 'Podstawowe' ";
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      echo '<h1>Wykształcenie</h1>
                            <table>
                            <tr>
                                <th>Podstawowe</th>
                              
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->Podstawowe.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                   $sql = "SELECT COUNT(poziom) AS 'Średnie' FROM wyksztalcenie WHERE poziom = 'Średnie' "; 
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                   echo'
                            <table>
                            <tr>

                                <th>Średnie</th>
                               
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->Średnie.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                   $sql = "SELECT COUNT(poziom) AS 'Techniczne' FROM wyksztalcenie WHERE poziom = 'Techniczne' "; 
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                   echo'
                            <table>
                            <tr>

                                <th>Techniczne</th>
                               
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->Techniczne.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                   $sql = "SELECT COUNT(poziom) AS 'Wyższe' FROM wyksztalcenie WHERE poziom = 'Wyższe' "; 
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                   echo'
                            <table>
                            <tr>

                                <th>Wyższe</th>
                               
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->Wyższe.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                 echo '<br>';
                  $sql = "SELECT COUNT(zatrudniono) AS 'wszystkie' FROM podanie"; 
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                   echo' <h1>Złożone aplikacje</h1>
                            <table>
                            <tr>

                                <th>Ilość aplikujących</th>
                               
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->wszystkie.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                  $sql = "SELECT COUNT(zatrudniono) AS 'zatrudnieni' FROM podanie WHERE zatrudniono='1'"; 
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                   echo' 
                            <table>
                            <tr>

                                <th>Zatrudnieni</th>
                               
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->zatrudnieni.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
                  $sql = "SELECT COUNT(zatrudniono) AS 'odrzuceni' FROM podanie WHERE zatrudniono='0'"; 
                   
                    
                  if ($result = mysqli_query($conn, $sql)) {
                   echo' 
                            <table>
                            <tr>

                                <th>Odrzuceni</th>
                               
                            </tr>';
                    while ($obj = mysqli_fetch_object($result)) {
                           
                        
                           echo '<tr>
                                <td>'.$obj->odrzuceni.'</td>
                               
                               
                                </tr>
                             </table>';
                          
                        }
                  }
             }
                
                
               
                      
                      $conn -> close();
                    ;?>
                <br> 
                <?php 
                  echo '<a  href="kierownik.php" style="text-decoration: none; "> <input  type="submit"  value="Powrót"> </a>';
            
                ?>
            </div>
    </body>
</html>