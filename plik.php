<?php
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
        header("Location: wymagane_dokumenty.php?alert=15");//wyslano plik na serwer
        }
    }
} else {
   echo 'Błąd przy przesyłaniu danych!';
    header("Location: wymagane_dokumenty.php?alert=13");//blad przy przesylaniu
}


?>