<?php
require_once "uzytkownik.php";

if(!isset($_POST['nazwa_uzytkownika'], $_POST['haslo']) || $_POST['nazwa_uzytkownika']=="" || $_POST['haslo']==""){
    header("Location: rejestracja.php?alert=1");
}
else{
    $nazwa_uzytkownika = $_POST['nazwa_uzytkownika'];
    $haslo = $_POST['haslo'];

    $uzytkownik = new Uzytkownik;
    $uzytkownik->dodajUzytkownika('petent', '', $nazwa_uzytkownika, $haslo,'0');

}

?>