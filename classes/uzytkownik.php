<?php

    class Uzytkownik
    {
        public $id;
        public $nazwa;
        public $email;
        public $uprawnienia;
        public $skrot_hasla;

        public function Zaloguj()
        {
            require("connection.php");

            $connection = new mysqli($servername, $username, $password, $dbname);

            if($connection->connect_error)
            {
                echo "Błąd połączenia z bazą: " . $connection->connect_errno;
                exit();
            }


            $query = "SELECT id, adres_email, uprawnienia FROM Uzytkownicy WHERE nazwa='" . $this->nazwa . "' AND skrot_hasla='" . $this->skrot_hasla . "'"; 

            //echo $query;
            //exit();

            $result = $connection->query($query);

            if($result->num_rows === 0)
            {
                // Nie znaleziono zadnego uzytkownika o podanych danych
                $connection->close();
                header('Location: login_failed.php');
            }
    
            if($result->num_rows === 1)
            {
                // Znaleziono dokładnie jednego uzytkownika o podanych danych (logowanie udane)
                $row = $result->fetch_assoc();
        
                // Ustawienie zmiennych sesji
                session_start();

                $_SESSION['logged_in'] = true;

                $this->id = $row['id'];
                $this->email = $row['adres_email'];
                $this->uprawnienia = $row['uprawnienia'];

                $_SESSION['user_id'] = $this->id;
                $_SESSION['user_name'] = $this->nazwa;
                $_SESSION['user_email'] = $this->email;
                $_SESSION['privilege'] = $this->uprawnienia;

                // Zamknięcie połączenia z bazą danych i przekierowanie
                $connection->close();
                header('Location: index.php'); 
            }

        }

        public function Wyloguj()
        {
            session_start();

            if(isset($_SESSION['logged_in']) and ($_SESSION['logged_in'] === true))
            {
                session_unset();
                header('Location: index.php');
            }   
        }
    }

?>