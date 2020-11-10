<?php
session_start();
require_once("podstawowe_informacje.php");

if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['id_uzytkownika'])){
    session_unset();
    session_destroy();
    header("Location: index.php?alert=1");//uzytkownik nie jest zalogowany
}
else if(!isset($_POST['plec'], $_POST['imie'], $_POST['nazwisko'], $_POST['data_urodzenia']) || $_POST['plec']=="" || $_POST['imie']=="" || $_POST['nazwisko']=="" || $_POST['data_urodzenia']==""){
    header("Location: form_podstawowe_informacje.php?alert=1");//uzytkownik nie uzupelnil formularza
}
else{
    $nazwa_uzytkownika = $_SESSION['nazwa_uzytkownika'];
    $id_uzytkownika = $_SESSION['id_uzytkownika'];
    $plec = $_POST['plec'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $data_urodzenia = $_POST['data_urodzenia'];

    $podstawowe_informacje = new PodstawoweInformacje;
    $podstawowe_informacje->dodajPodstawoweInformacje($plec, $id_uzytkownika, $imie,$nazwisko,$data_urodzenia);

}
?>