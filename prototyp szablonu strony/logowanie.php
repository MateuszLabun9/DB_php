<?php
session_start();

require_once "connect.php";

if(!isset($_POST['nazwa_uzytkownika'], $_POST['haslo']) || $_POST['nazwa_uzytkownika']=="" || $_POST['haslo']==""){
    header("Location: index.php");
}
$nazwa_uzytkownika= $_POST['nazwa_uzytkownika'];
$haslo = $_POST['haslo'];


$conn = @new mysqli($host, $db_user, $db_password, $db_name);

if($conn->connect_errno!=0){
    echo "blad elo";
    header("Location: index.php");//nie laczy z baza
}
else{
    $sql = "SELECT * FROM uzytkownik WHERE nazwa_uzytkownika='".$nazwa_uzytkownika."' AND haslo='".$haslo."';";
    if($result = @$conn->query($sql)){
        $users = $result->num_rows;
        if($users>0){
            $row = $result->fetch_assoc();
            if($row['czy_usuniety']==0){
                $_SESSION['nazwa_uzytkownika']=$row['nazwa_uzytkownika'];
                $_SESSION['typ_uzytkownika']=$row['typ_uzytkownika'];
                
                $result->close();
                
                if($row['typ_uzytkownika']=='petent'){
                    header("Location: petent.php");//uzyszkodnik aktywny, nastapilo zalogowanie
                }
                else if($row['typ_uzytkownika']=='administrator'){
                    header("Location: administrator.php");//uzyszkodnik aktywny, nastapilo zalogowanie
                }
                else if($row['typ_uzytkownika']=='kierownik'){
                    header("Location: kierownik.php");//uzyszkodnik aktywny, nastapilo zalogowanie
                }
                else if($row['typ_uzytkownika']=='asystent'){
                    header("Location: asystent.php");//uzyszkodnik aktywny, nastapilo zalogowanie
                }
                
            }
            else{
                header("Location: index.php");//uzyszkodnik usuniety
            }
            $result->close();
        }
        else{
            header("Location: index.php");//nie znaleziono uzyszkodnika
        }
    }
    else{
        header("Location: index.php");//blad obslugi zapytania
    }
    $conn->close();
}

?>