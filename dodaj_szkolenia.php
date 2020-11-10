<?php
session_start();
require_once("szkolenia.php");

if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['id_uzytkownika'])){
    session_unset();
    session_destroy();
    header("Location: index.php?alert=1");//uzytkownik nie jest zalogowany
}
else if(!isset($_POST['nazwa_szkolenia'], $_POST['rok_rozp_s']) || $_POST['nazwa_szkolenia']=="" || $_POST['rok_rozp_s']==NULL){
    header("Location: form_szkolenia.php?alert=1");//uzytkownik nie uzupelnil formularza
}
else{
    $nazwa_uzytkownika = $_SESSION['nazwa_uzytkownika'];
    $id_uzytkownika = $_SESSION['id_uzytkownika'];
    $nazwa_szkolenia = $_POST['nazwa_szkolenia'];
    $rok_rozp_s = $_POST['rok_rozp_s'];

    $szkolenia = new Szkolenia;
    $szkolenia->dodajSzkolenia($nazwa_szkolenia, $id_uzytkownika, $rok_rozp_s);

}
?>