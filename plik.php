<?php
require_once "connect.php";
session_start();

$max_rozmiar = 1024*2048;
if (is_uploaded_file($_FILES['plik']['tmp_name'])) {
    if ($_FILES['plik']['size'] > $max_rozmiar) {
        echo 'Błąd! Plik jest za duży!';
        header("Location: wymagane_dokumenty.php?alert=14");//plik za duzy
    } else {
        echo 'Odebrano plik. Początkowa nazwa: '.$_FILES['plik']['name'];
        echo '<br/>';
        if ($_FILES['plik']['type'] != 'application/pdf') {
            header("Location: wymagane_dokumenty.php?alert=12");//zly typ pliku
        }
        else{
        move_uploaded_file($_FILES['plik']['tmp_name'],
                $_SERVER['DOCUMENT_ROOT'].'/wyslane_dokumenty/'.$_FILES['plik']['name']);
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);

        if($conn->connect_errno!=0){
            header("Location: wymagane_dokumenty.php?alert=4");//nie laczy z baza
        }
        else{
            $sql="INSERT INTO zalaczone_dokumenty (id_uzytkownika, nazwa_pliku) VALUES ('".$_SESSION['id_uzytkownika']."', '".$_FILES['plik']['name']."');";
            if($conn->query($sql) === TRUE){
                header("Location: wymagane_dokumenty.php?alert=15");//wyslano plik na serwer
            }
            else{
                header("Location: rejestracja.php?alert=3");//blad obslugi zapytania
            }
        }
        
        
        }
    }
} else {
   echo 'Błąd przy przesyłaniu danych!';
    header("Location: wymagane_dokumenty.php?alert=13");//blad przy przesylaniu
}


?>