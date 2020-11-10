<?php
class Szkolenia{
    public $nazwa_szkolenia;
    public $id_uzytkownika;
    public $rok_rozp_s;
    public function dodajSzkolenia($nazwa_szkolenia, $id_uzytownika, $rok_rozp_s){
        require_once "connect.php";
        $this->nazwa_szkolenia = $nazwa_szkolenia;
        $this->id_uzytkownika = $id_uzytkownika;
        $this->rok_rozp_s = $rok_rozp_s;
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        
        if($conn->connect_errno!=0){
            header("Location: rejestracja.php?alert=4");//nie laczy z baza
        }
        else{
            $sql = "INSERT INTO szkolenia (klucz_szkolenia, id_uzytkownika, nazwa_szkolenia, rok_rozp_s) VALUES (NULL, '".$id_uzytownika."', '".$nazwa_szkolenia."', '".$rok_rozp_s."');";
            if($conn->query($sql) === TRUE){
                header("Location: form_szkolenia.php");//dodano wyksztalcenie
            }
            else{
                header("Location: form_szkolenia.php?alert=3");//blad obslugi zapytania
            }
        }
        
    }
}
?>