<?php
class Doswiadczenie{
    public $nazwa_firmy;
    public $id_uzytkownika;
    public $stanowisko;
    public $rok_rozp_d;
    public $rok_zak_d;
    public function dodajDoswiadczenie($nazwa_firmy, $id_uzytownika, $stanowisko, $rok_rozp_d, $rok_zak_d){
        require_once "connect.php";
        $this->nazwa_firmy = $nazwa_firmy;
        $this->id_uzytkownika = $id_uzytkownika;
        $this->stanowisko = $stanowisko;
        $this->rok_rozp_d = $rok_rozp_d;
        $this->rok_zak_d = $rok_zak_d;
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        
        if($conn->connect_errno!=0){
            header("Location: rejestracja.php?alert=4");//nie laczy z baza
        }
        else{
            $sql = "INSERT INTO doswiadczenie (klucz_doswiadczenie, id_uzytkownika, nazwa_firmy, stanowisko, rok_rozpoczecia, rok_zakonczenia) VALUES (NULL, '".$id_uzytownika."', '".$nazwa_firmy."', '".$stanowisko."', '".$rok_rozp_d."', '".$rok_zak_d."');";
            if($conn->query($sql) === TRUE){
                header("Location: form_doswiadczenie.php");//dodano wyksztalcenie
            }
            else{
                header("Location: form_doswiadczenie.php?alert=3");//blad obslugi zapytania
            }
        }
        
    }
}
?>