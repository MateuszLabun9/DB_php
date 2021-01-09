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

            <div id="test">         
            </div>

           
            <br>
            <?php 
                    require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                   
           
            if($conn->connect_errno!=0){
                 header("Location: index.php?alert=4");//nie laczy z baza
                }  
            
            
            $sql = "SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika='".$_GET['uzytkownik']."'";
            
             if ($result = mysqli_query($conn, $sql)) {
                    while ($obj = mysqli_fetch_object($result)) {
             echo ' <a> Wysłano zaproszenie do użytkownika: '.$obj->nazwa_uzytkownika.' </a> ';
                    }
                }
             $sql = "UPDATE podanie u SET etap_rekrutacji = '2'  WHERE u.id_uzytkownika='".$_GET['uzytkownik']."';";
               
            
             
            if ($conn->query($sql) === TRUE) {}
$conn->close();
                
                
              ?>
                      
                         
           
          
            <br><br>

          <?php
    
                echo '<a  href="wylogowywanie.php" style="text-decoration: none; "> <input  type="submit"  value="Wyloguj"> </a>';
            ?>  
                 <a  href="asystent.php" style="text-decoration: none; "> <input  type="submit"  value="Powrót"> </a>
            </div>
    </body>
</html> 