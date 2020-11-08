<?php
class Wyksztalcenie{
    public $poziom;
    public $id_uzytkownika;
    public $nazwa_szkoly;
    public $rok_rozp;
    public $rok_zak;
    public function dodajWyksztalcenie($poziom, $id_uzytownika, $nazwa_szkoly, $rok_rozp, $rok_zak){
        require_once "connect.php";
        $this->poziom = $poziom;
        $this->id_uzytkownika = $id_uzytkownika;
        $this->nazwa_szkoly = $nazwa_szkoly;
        $this->rok_rozp = $rok_rozp;
        $this->rok_zak = $rok_zak;
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        
        if($conn->connect_errno!=0){
            header("Location: rejestracja.php?alert=4");//nie laczy z baza
        }
        else{
            $sql = "INSERT INTO wyksztalcenie (klucz_wyksztalcenie, id_uzytkownika, poziom, nazwa_szkoly, rok_rozpoczecia, rok_zakonczenia) VALUES (NULL, '".$id_uzytownika."', '".$poziom."', '".$nazwa_szkoly."', '".$rok_rozp."', '".$rok_zak."');";
            if($conn->query($sql) === TRUE){
                header("Location: form_wyksztalcenie.php");//dodano wyksztalcenie
            }
            else{
                header("Location: form_wyksztalcenie.php?alert=3");//blad obslugi zapytania
            }
        }
        
    }
}
?>