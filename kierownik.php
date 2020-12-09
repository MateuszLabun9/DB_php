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
                <p class="test"> Tutaj znajduje się lista podań do decyzji:</p>
                
                                <br>
                 <table>
                <tr>
                    <th>Login</th>
                    <th>Identyfikator</th>
                    <th>Typ użytkownika</th>
                    <th>Podgląd</th>
                    <th>Zatrudnij</th>
                    <th>Odrzuć rekruta</th>
                </tr>
                     
                 <?php 
                    require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                 
            if($conn->connect_errno!=0){
                 header("Location: index.php?alert=4");//nie laczy z baza
                }  
             else{
                    $sql = "SELECT uzytkownik.typ_uzytkownika, uzytkownik.id_uzytkownika, uzytkownik.nazwa_uzytkownika, podanie.etap_rekrutacji FROM uzytkownik JOIN podanie ON uzytkownik.id_uzytkownika=podanie.id_uzytkownika";
                    
                  if ($result = mysqli_query($conn, $sql)) {
                      
                    while ($obj = mysqli_fetch_object($result)) {
                          if($obj->etap_rekrutacji==4)  { 
                           echo '<tr>
                                <td>'.$obj->nazwa_uzytkownika.'</td>
                                <td>'.$obj->id_uzytkownika.'</td>
                                <td>'.$obj->typ_uzytkownika.'</td>   
                                <td><a href="asystent_przeglad_podan.php?uzytkownik='.$obj->id_uzytkownika.'">edytuj</a></td>
                               
                                <form method="POST">
                              
                                 <td><button name="update1" value="'.$obj->id_uzytkownika.'">Zatrudnij</button></td>
                                <td><button name="update" value="'.$obj->id_uzytkownika.'">Usuń</button></td>
                                </form>
                                 </tr>';
                          }
                    }
                  }
             }
               
                      if(isset($_POST['update'])) // when click on Update button
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '6' WHERE u.id_uzytkownika=".$_POST['update'].";");
                             if ($conn->query($edit) === TRUE) {}
                            
                                }
                     if(isset($_POST['update1'])) // when click on Update button
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '5' WHERE u.id_uzytkownika=".$_POST['update1'].";");
                             if ($conn->query($edit) === TRUE) {}
                  
                            }
                      $conn -> close();
                    ;?>
                </table> <br> 
                <?php 
                  echo '<a  href="wylogowywanie.php" style="text-decoration: none; "> <input  type="submit"  value="Wyloguj"> </a>';
                ?>
            </div>
    </body>
</html>