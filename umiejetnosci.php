<?php
class Umiejetnosci{
    public $nazwa_umiejetnosci;
    public $id_uzytkownika;
    public $poziom_umiejetnosci;
    public function dodajUmiejetnosci($nazwa_umiejetnosci, $id_uzytownika, $poziom_umiejetnosci){
        require_once "connect.php";
        $this->nazwa_umiejetnosci = $nazwa_umiejetnosci;
        $this->id_uzytkownika = $id_uzytkownika;
        $this->poziom_umiejetnosci = $poziom_umiejetnosci;
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        
        if($conn->connect_errno!=0){
            header("Location: rejestracja.php?alert=4");//nie laczy z baza
        }
        else{
            $sql = "INSERT INTO umiejetnosci (klucz_umiejetnosci, id_uzytkownika, nazwa_umiejetnosci, poziom_umiejetnosci) VALUES (NULL, '".$id_uzytownika."', '".$nazwa_umiejetnosci."', '".$poziom_umiejetnosci."');";
            if($conn->query($sql) === TRUE){
                header("Location: form_umiejetnosci.php");//dodano umijetnosci
            }
            else{
                header("Location: form_umiejetnosci.php?alert=3");//blad obslugi zapytania
            }
        }
        
    }
}
?>