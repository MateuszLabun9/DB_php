<?php
class Uzytkownik{
    public $typ_uzytkownika;
    public $id_uzytkownika;
    public $nazwa_uzytownika;
    public $haslo;
    public $czy_usunety;
    public function dodajUzytkownika($typ_uzytkownika, $id_uzytkownika, $nazwa_uzytkownika, $haslo, $czy_usuniety){
        require_once "connect.php";
        $this->typ_uzytkownika = $typ_uzytkownika;
        $this->id_uzytkownika = $id_uzytkownika;
        $this->nazwa_uzytkownika = $nazwa_uzytkownika;
        $this->haslo = $haslo;
        $this->czy_usuniety = $czy_usuniety;
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);

        if($conn->connect_errno!=0){
            header("Location: rejestracja.php?alert=4");//nie laczy z baza
        }
        else{
            $sql0 = "SELECT * FROM uzytkownik WHERE nazwa_uzytkownika='".$nazwa_uzytkownika."';";
            if($result = @$conn->query($sql0)){
                $users = $result->num_rows;
                if($users>0){
                    $result->close();
                    header("Location: rejestracja.php?alert=6");//istnieje juz taki uzytkownik
                }
                else{
                    $sql="INSERT INTO uzytkownik (typ_uzytkownika, id_uzytkownika, nazwa_uzytkownika, haslo, czy_usuniety) VALUES ('".$typ_uzytkownika."', '".$id_uzytkownika."', '".$nazwa_uzytkownika."', '".$haslo."', '".$czy_usuniety."');";
                    if($conn->query($sql) === TRUE){
                        header("Location: index.php?alert=5");//uzytkownik utworzony
                    }
                    else{
                        header("Location: rejestracja.php?alert=3");//blad obslugi zapytania
                    }
                }
            }
            else{
                header("Location: rejestracja.php?alert=3");//blad obslugi zapytania
            }
            $conn->close();
        }
    }
    public function usunUzytkownika($nazwa_uzytkownika, $haslo){
        require_once "connect.php";
        $this->nazwa_uzytkownika = $nazwa_uzytkownika;
        $this->haslo = $haslo;
        
        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        
        if($conn->connect_errno!=0){
            header("Location: index.php?alert=4");//nie laczy z baza
        }
        else{
            $sql0 = "SELECT * FROM uzytkownik WHERE uzytkownik.nazwa_uzytkownika='".$nazwa_uzytkownika."' AND uzytkownik.haslo='".$haslo."';";
            if($result = @$conn->query($sql0)){
                $users = $result->num_rows;
                if($users>0){
                    $result->close();
                    $sql="UPDATE uzytkownik SET czy_usuniety = '1' WHERE uzytkownik.nazwa_uzytkownika = '".$nazwa_uzytkownika."' AND uzytkownik.haslo = '".$haslo."';";
                    if($conn->query($sql) === TRUE){
                        session_start();
                        session_unset();
                        session_destroy();
                        header("Location: index.php?alert=2");
                    }
                    else{
                        session_start();
                        session_unset();
                        session_destroy();
                        header("Location: index.php?alert=3");
                    }
                $conn->close();
                }
                else{
                    session_start();
                    session_unset();
                    session_destroy();
                    header("Location: index.php?alert=1");
                }
            }
        }
    }
    public function Logowanie($nazwa_uzytkownika, $haslo){
            require_once "connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);

            if($conn->connect_errno!=0){
                echo "blad";
                header("Location: index.php?alert=4");//nie laczy z baza
            }
            else{
                $sql = "SELECT * FROM uzytkownik WHERE nazwa_uzytkownika='".$nazwa_uzytkownika."' AND haslo='".$haslo."';";
                if($result = @$conn->query($sql)){
                    $users = $result->num_rows;
                    if($users>0){
                        $row = $result->fetch_assoc();
                        if($row['czy_usuniety']==0){
                            $_SESSION['nazwa_uzytkownika']=$row['nazwa_uzytkownika'];
                            $_SESSION['typ_uzytkownika']=$row['typ_uzytkownika'];

                            $result->close();

                            if($row['typ_uzytkownika']=='petent'){
                                header("Location: petent.php");//uzytkownik aktywny, nastapilo zalogowanie
                            }
                            else if($row['typ_uzytkownika']=='administrator'){
                                header("Location: administrator.php");//uzytkownik aktywny, nastapilo zalogowanie
                            }
                            else if($row['typ_uzytkownika']=='kierownik'){
                                header("Location: kierownik.php");//uzytkownik aktywny, nastapilo zalogowanie
                            }
                            else if($row['typ_uzytkownika']=='asystent'){
                                header("Location: asystent.php");//uzytkownik aktywny, nastapilo zalogowanie
                            }

                        }
                        else{
                            header("Location: index.php?alert=2");//uzytkownik usuniety
                        }
                        $result->close();
                    }
                    else{
                        header("Location: index.php?alert=1");//nie znaleziono uzytkownika 
                    }
                }
                else{
                    header("Location: index.php?alert=3");//blad obslugi zapytania
                }
                $conn->close();
            }
    }
}
?>