<?php
class PodstawoweInformacje{
    public $plec;
    public $id_uzytkownika;
    public $imie;
    public $nazwisko;
    public $data_urodzenia;
    public function dodajPodstawoweInformacje($plec, $id_uzytownika, $imie,$nazwisko,$data_urodzenia){
        require_once "connect.php";
        $this->plec = $plec;
        $this->id_uzytkownika = $id_uzytkownika;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->data_urodzenia = $data_urodzenia;
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        
        if($conn->connect_errno!=0){
            header("Location: rejestracja.php?alert=4");//nie laczy z baza
        }
        else{
            $sql = "INSERT INTO podanie (id_podania, id_uzytkownika, plec, imie, nazwisko, data_urodzenia) VALUES (NULL, '".$id_uzytownika."', '".$plec."', '".$imie."', '".$nazwisko."', '".$data_urodzenia."');";
            if($conn->query($sql) === TRUE){
                header("Location: form_wyksztalcenie.php");
            }
            else{
                header("Location: form_podstawowe_informacje.php?alert=3");//blad obslugi zapytania
            }
        }
        
    }
}
?>