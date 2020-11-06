<?php
session_start();
require_once "uzytkownik.php";


if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['typ_uzytkownika'], $_POST['haslo']) && $_SESSION['typ_uzytkownika']!='petent'){
    session_unset();
    session_destroy();
    header("Location: index.php");
}
else{
    $nazwa_uzytkownika = $_SESSION['nazwa_uzytkownika'];
    $haslo = $_POST['haslo'];
    
    $uzytkownik = new Uzytkownik;
    $uzytkownik->usunUzytkownika($nazwa_uzytkownika, $haslo);
}
?>