<?php
require_once "connect.php";

if(!isset($_POST['nazwa_uzytkownika'], $_POST['haslo'], $_POST['imie'], $_POST['nazwisko'], $_POST['data_urodzenia'], $_POST['gender']) || $_POST['nazwa_uzytkownika']=="" || $_POST['haslo']==""){
    header("Location: index.php");
}
$nazwa_uzytkownika = $_POST['nazwa_uzytkownika'];
$haslo = $_POST['haslo'];

$conn = @new mysqli($host, $db_user, $db_password, $db_name);

if($conn->connect_errno!=0){
    echo "blad elo";
    header("Location: index.php");//nie laczy z baza
}
else{
    $sql="INSERT INTO uzytkownik (typ_uzytkownika, id_uzytkownika, nazwa_uzytkownika, haslo, czy_usuniety) VALUES ('petent', '', '".$nazwa_uzytkownika."', '".$haslo."', '0');";
    if($conn->query($sql) === TRUE){
        //$result->close();
        header("Location: index.php");//uzyszkodnik utworzony
    }
    else{
        header("Location: rejestracja.php");//blad obslugi zapytania
    }
    $conn->close();
}

?>