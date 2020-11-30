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
                    //tu połączyć się z bazą i pobrać co tam bedziesz potrzebował z BD
                   
                    require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                   
            if($conn->connect_errno!=0){
                 header("Location: index.php?alert=4");//nie laczy z baza
                }  
             else{
                    $sql = "SELECT * FROM podanie WHERE id_uzytkownika=".$_GET['uzytkownik'].";";
                    
                  if ($result = mysqli_query($conn, $sql)) {
                        echo '<table>
                <tr>
                    <th>Company</th>
                    <th>Contact</th>
                    <th>Country</th>
                    <th>Podgląd</th>
                </tr>
              ';
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
                   $sql = "SELECT * FROM doswiadczenie WHERE id_uzytkownika=".$_GET['uzytkownik'].";";
                                   if ($result = mysqli_query($conn, $sql)) {
                        echo '<table>
                                <tr>
                                    <th>Company</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                    <th>Podgląd</th>
                                </tr>
              ';
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

              $conn->close();
                }
                
                
            
            ?>
        
     
                          
<!-- test pobierania z bazy -->
       <?php
            
            ?>
                  
            </div>
    </body>
</html>