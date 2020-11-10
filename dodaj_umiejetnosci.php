<?php
session_start();
require_once("umiejetnosci.php");

if(!isset($_SESSION['nazwa_uzytkownika'], $_SESSION['id_uzytkownika'])){
    session_unset();
    session_destroy();
    header("Location: index.php?alert=1");//uzytkownik nie jest zalogowany
}
else if(!isset($_POST['nazwa_umiejetnosci'], $_POST['poziom_umiejetnosci'] || $_POST['nazwa_umiejetnosci']=="" || $_POST['poziom_umiejetnosci']==""){
    header("Location: form_umiejetnosci.php?alert=1");//uzytkownik nie uzupelnil formularza
}
else{
    $nazwa_uzytkownika = $_SESSION['nazwa_uzytkownika'];
    $id_uzytkownika = $_SESSION['id_uzytkownika'];
    $nazwa_umiejetnosci = $_POST['nazwa_umiejetnosci'];
    $poziom_umiejetnosci = $_POST['poziom_umiejetnosci'];

    $umiejetnosci = new Umiejetnosci;
    $umiejetnosci->dodajUmiejetnosci($nazwa_umiejetnosci, $id_uzytkownika, $poziom_umiejetnosci);

}
?>