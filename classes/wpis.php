<?php
    class Wpis
    {
        public $id;
        public $data;
        public $tytul;
        public $tresc;
        public $edytowany;
        public $komentarze = array();

        // Wyświetla treść HTML wpisu
        function Wyswietl()
        {
            // Wyświetlenie wpisu
            echo
            '
                <div>
                    <b style="padding: 20px; font-size: 24px; margin-top:20px;">' . $this->tytul . '</b>
                    <div class="post_content">
                        <p>' . $this->tresc . '</p>
                    </div>
                </div>
            ';

            // Wyświetlenie komentarzy
            foreach($this->komentarze as $komentarz)
            {
                $komentarz->Wyswietl();
            }

            // Wyświetlenie formularza edycji nowego komentarza, jezeli uzytkownik zalogowany
            if(isset($_SESSION['logged_in']) and ($_SESSION['logged_in'] === true))
            {
                echo
                '
                    <div class="comment" style="height: 100px;">
                        Skomentuj
                        <hr>
                        <form action="add_comment.php?post_id=' . $this->id . '" method="post">
                            <textarea rows="3" cols="180" name="comm_content">Twój komentarz...</textarea>
                            <br>
                            <input type="submit" style="margin-left: 450px; margin-top: 5px; margin-right: 5px;" value="Opublikuj">
                        </form>
                    </div>
                ';
            }
        }

        // Dodaje nowy wpis do bazy
        function Dodaj()
        {
            require("connection.php");

            $connection = new mysqli($servername, $username, $password, $dbname);

            if($connection->connect_error)
            {
                echo "Błąd połączenia z bazą";
            }

            // Znalezienie maksymalnego id w tabeli (nie jest AUTO_INCREMENT)
            $query1 = "SELECT MAX(id) FROM Wpisy;";
            $result1 = $connection->query($query1);
            $row = mysqli_fetch_array($result1);
            $max_id = $row['MAX(id)'];
            
            $max_id++;

            // Wstawienie nowego wpisu do tabeli
            $query2 = "INSERT INTO Wpisy(`id`, `data`, `tytul`, `tresc`, `edytowany`) VALUES (" . $max_id . ", '" . $this->data . "', '" . $this->tytul . "', '" . $this->tresc . "', 0);";

            $result2 = $connection->query($query2);

            $connection->close();
        }

        // Zapisuje zmiany w istniejącym w bazie wpisie
        function ZapiszZmiany()
        {
            /*
                TODO
            */
        }
    }
?>