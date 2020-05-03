<?php
    class Komentarz
    {
        public $id;
        public $autor;
        public $date;
        public $tresc;
        public $edytowany;

        // Wyświetla treść HTML komentarza
        public function Wyswietl()
        {
            $edit_str = "";

            if($this->edytowany)
            {
                $edit_str = "(edytowany)";
            }

            echo
                '
                    <div class="comment">
                        ' . $this->autor . ' ' . $this->data . ' ' . $edit_str . '
                        <hr>
                        <p>' . $this->tresc . '</p>
                    </div>
                ';
        }

        // Dodaje nowy komentarz do bazy
        public function Dodaj()
        {
            require("connection.php");

            $connection = new mysqli($servername, $username, $password, $dbname);

            if($connection->connect_error)
            {
                echo "Błąd połączenia z bazą";
            }

            // Znalezienie maksymalnego id w tabeli (nie jest AUTO_INCREMENT)
            $query1 = "SELECT MAX(id) FROM Komentarze;";
            $result1 = $connection->query($query1);
            $row = mysqli_fetch_array($result1);
            $max_id = $row['MAX(id)'];
            
            $max_id++;

            // ID wpisu
            $post_id;
            if(isset($_SESSION['post_id']))
            {
                $post_id = $_SESSION['post_id'];
                unset($_SESSION['post_id']);
            }

            // ID uzytkownika (wyciągnąć po user_name)
            $username = $_SESSION['user_name'];

            $query2 = "SELECT id FROM Uzytkownicy WHERE nazwa='" . $username . "'";
            $result2 = $connection->query($query2);
            $row = mysqli_fetch_array($result2);
            $user_id = $row['id'];

            // Wstawienie nowego wpisu do tabeli
            $query3 = "INSERT INTO Komentarze(`id`, `id_wpisu`, `id_uzytkownika`, `data`, `tresc`, `edytowany`, `niestosowny`) VALUES (" . $max_id . ", " . $post_id . ", " . $user_id . ", '" . $this->date . "', '" . $this->tresc . "', 0, 0);";

            $result3 = $connection->query($query3);

            $connection->close();
        }

        // Zapisuje zmiany w istniejącym w bazie komentarzu
        public function ZapiszZmiany()
        {
            /*
                TODO
            */
        }
    }
?>