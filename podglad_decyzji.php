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
        <link rel="stylesheet" href="style/style_glowny.css" type="text/css" />
    </head>
    <body>
      <h1>System rejestracji podań osób starających się o pracę</h1>
     <div id="container">  
          <form action="podglad_decyzji.php" method="post" enctype="multipart/form-data">
              
              
              <?php
              
              require_once "connect.php";

                $conn = @new mysqli($host, $db_user, $db_password, $db_name);

                if($conn->connect_errno!=0){
                    header("Location: petent.php?alert=4");//nie laczy z baza
                }
                else{
                    $sql = "SELECT p.* FROM podanie p, uzytkownik u WHERE u.id_uzytkownika=p.id_uzytkownika AND u.nazwa_uzytkownika='".$_SESSION['nazwa_uzytkownika']."';";
                    if($result = $conn->query($sql)){
                        $podania = $result->num_rows;
                        if($podania>0){
                            $row = $result->fetch_assoc();
                          
                           if ($row['etap_rekrutacji'] == 1) echo '<a>Twój formularz został pomyślnie zapisany w bazie.</a><br><br>';
                            
                            else if ($row['etap_rekrutacji'] == NULL) {
                                $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '1' WHERE u.id_uzytkownika=".$_SESSION['id_uzytkownika'].";");
                                if ($conn->query($edit) === TRUE) {}
                                header("Refresh:0");
                            }
                            else if ($row['etap_rekrutacji'] == 2) {
                                
                                echo '<a>Gratulacje! zostałeś zaproszony na rozmowę kwalifikacyjną </a><br><br>';
                            
                                echo '<a href="akceptacja_rozmowy_przez_petenta.php"     class="przycisk" style="background-color=#ff7f00; ">akceptuj</a>';
                            }
                             else if ($row['etap_rekrutacji'] == 3) {
                                
                                echo '<a>Rekruter wkrótce się z tobą skontaktuje. Prosimy o cierpliwość.</a><br><br>';
                            
                             }
                            else if ($row['etap_rekrutacji'] == 4){
                                
                                echo '<a>Po rozmowie kwalifikacyjnej twoje zgłoszenie oczekuje na rozpatrzenie w zarządzie. Wkrótce poinformujemy Cię o stanie rekrutacji.</a><br><br>';
                            }
                             else if ($row['etap_rekrutacji'] == 5){
                                
                                echo '<a>Gratulacje! '.$_SESSION['nazwa_uzytkownika'].' Zarząd pomyślnie rozpatrzył twoją aplikację. Ostatnim krokiem jest potwierdzenie chęci współpracy.</a><br><br>';
                                
                                 echo '<form method="POST"><button name="update"  value="'.$_SESSION['id_uzytkownika'].'">Akceptuje</button></form></br>
                                 
                                 <form method="POST"><button  name="update1" value="'.$_SESSION['id_uzytkownika'].'">Odrzucam</button></form>';
                                
                            }
                             else if ($row['etap_rekrutacji'] == 6){
                                
                                echo '<a>Dziękujemy za poświęcony czas. Czy chcesz zachować swój formularz w systemie? Może on zostać wykorzystany w przyszłych rekrutacjach.</a><br><br>';
                                
                                 echo '<form method="POST"><button   name="update2"  value="'.$_SESSION['id_uzytkownika'].'">Zostawiam dane</button></form></br>
                                 
                                 <form method="POST"><button name="update3" value="'.$_SESSION['id_uzytkownika'].'">Usuwam dane</button></form>';
                                
                            }
                            else if ($row['etap_rekrutacji'] == 7){
                                
                                echo '<a>Gratulacje! Wkrótce skontaktuje się z Tobą osoba z działu HR w celu omówienia szczegółów rozpoczęcia pracy.</a><br><br>';
                                echo '<a class="przycisk"  href="wylogowywanie.php" >Wyloguj</a>';
                                
                            }
                            else if ($row['etap_rekrutacji'] == 8){
                                
                                echo '<a>Zapisano podanie dla przyszłych rekrutacji, możesz się wylogować.</a><br><br>';
                                echo '<a class="przycisk"  href="wylogowywanie.php" >Wyloguj</a>';
                                
                            }
                                
                              if(isset($_POST['update'])) 
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '7', zatrudniono = '1'  WHERE u.id_uzytkownika=".$_POST['update'].";");
                             if ($conn->query($edit) === TRUE) {}
                            header("Refresh:0");
                                }
                            if(isset($_POST['update1'])) 
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '6', zatrudniono = '0' WHERE u.id_uzytkownika=".$_POST['update1'].";");
                             if ($conn->query($edit) === TRUE) {}
                            header("Refresh:0");
                                }
                               if(isset($_POST['update2'])) // odrzucony ale zostawil podanie
                                {
                             $edit = mysqli_query($conn, "UPDATE podanie u SET etap_rekrutacji = '8' WHERE u.id_uzytkownika=".$_POST['update2'].";");
                             if ($conn->query($edit) === TRUE) {}
                            header("Refresh:0");
                                }
                            if(isset($_POST['update3'])) // odrzucony i usuwa dane
                                {
                            $edit = mysqli_query($conn, "DELETE FROM doswiadczenie WHERE id_uzytkownika=".$_POST['update3'].";");
                            if ($conn->query($edit) === TRUE) {}
                            $edit = mysqli_query($conn, "DELETE FROM szkolenia WHERE id_uzytkownika=".$_POST['update3'].";");
                            if ($conn->query($edit) === TRUE) {}
                            $edit = mysqli_query($conn, "DELETE FROM umiejetnosci WHERE id_uzytkownika=".$_POST['update3'].";");
                            if ($conn->query($edit) === TRUE) {}
                            $edit = mysqli_query($conn, "DELETE FROM wyksztalcenie WHERE id_uzytkownika=".$_POST['update3'].";");
                            if ($conn->query($edit) === TRUE) {}
                            $edit = mysqli_query($conn, "DELETE FROM podanie WHERE id_uzytkownika=".$_POST['update3'].";");
                            if ($conn->query($edit) === TRUE) {}
                            header("Refresh:0");
                                }
                        }
                        
                        else header("Location: petent.php?alert=9");//nie wyslano podania
                    }
                    else{
                        header("Location: petent.php?alert=3");//blad obslugi zapytania
                    }
                }
               $conn -> close();
              ?>
         </form>
         <br><br><br>
                <a href="finalizacja.php" class="przycisk" style="text-decoration: none;">Podgląd podania</a><br>
                <a href="petent.php" class="przycisk" style="text-decoration: none;">Powrót do strony głównej</a>
        </div>
         
    </body>
</html>