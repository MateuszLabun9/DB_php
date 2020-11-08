<?php
session_start();
require_once("wyksztalcenie.php");

if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['id_uzytkownika'])){
    session_unset();
    session_destroy();
    header("Location: index.php?alert=1");//uzytkownik nie jest zalogowany
}
else if(!isset($_POST['poziom'], $_POST['nazwa_szkoly'], $_POST['rok_rozp_w'], $_POST['rok_zak_w']) || $_POST['poziom']=="" || $_POST['nazwa_szkoly']=="" || $_POST['rok_rozp_w']==NULL || $_POST['rok_zak_w']==NULL){
    header("Location: form_wyksztalcenie.php?alert=1");//uzytkownik nie uzupelnil formularza
}
else{
    $nazwa_uzytkownika = $_SESSION['nazwa_uzytkownika'];
    $id_uzytkownika = $_SESSION['id_uzytkownika'];
    $poziom = $_POST['poziom'];
    $nazwa_szkoly = $_POST['nazwa_szkoly'];
    $rok_rozp = $_POST['rok_rozp_w'];
    $rok_zak = $_POST['rok_zak_w'];

    $wyksztalcenie = new Wyksztalcenie;
    $wyksztalcenie->dodajWyksztalcenie($poziom, $id_uzytkownika, $nazwa_szkoly, $rok_rozp, $rok_zak);

}
?>