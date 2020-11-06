<?php
session_start();

require_once "uzytkownik.php";

if(!isset($_POST['nazwa_uzytkownika'], $_POST['haslo']) || $_POST['nazwa_uzytkownika']=="" || $_POST['haslo']==""){
    header("Location: index.php?alert=1");
}
$nazwa_uzytkownika= $_POST['nazwa_uzytkownika'];
$haslo = $_POST['haslo'];


    $uzytkownik = new Uzytkownik;
    $uzytkownik->Logowanie($nazwa_uzytkownika, $haslo);

?>