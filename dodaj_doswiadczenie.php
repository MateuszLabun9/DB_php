<?php
session_start();
require_once("doswiadczenie.php");

if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['id_uzytkownika'])){
    session_unset();
    session_destroy();
    header("Location: index.php?alert=1");//uzytkownik nie jest zalogowany
}
else if(!isset($_POST['nazwa_firmy'], $_POST['stanowisko'], $_POST['rok_rozp_d'], $_POST['rok_zak_d']) || $_POST['nazwa_firmy']=="" || $_POST['stanowisko']=="" || $_POST['rok_rozp_d']==NULL || $_POST['rok_zak_d']==NULL){
    header("Location: form_doswiadczenie.php?alert=1");//uzytkownik nie uzupelnil formularza
}
else{
    $nazwa_uzytkownika = $_SESSION['nazwa_uzytkownika'];
    $id_uzytkownika = $_SESSION['id_uzytkownika'];
    $nazwa_firmy = $_POST['nazwa_firmy'];
    $stanowisko = $_POST['stanowisko'];
    $rok_rozp_d = $_POST['rok_rozp_d'];
    $rok_zak_d = $_POST['rok_zak_d'];

    $doswiadczenie = new Doswiadczenie;
    $doswiadczenie->dodajDoswiadczenie($nazwa_firmy, $id_uzytkownika, $stanowisko, $rok_rozp_d, $rok_zak_d);

}
?>