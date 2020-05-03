<?php
    session_start();
    require("classes/wpis.php");
    require("classes/komentarz.php");
    require("connection.php");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Blog programisty</title>
    </head>
    <body>
        <div class="container">
            <div class = "header">
                <div class="logo">
                    Blog programisty
                </div>
            </div>
            <div class = "navbar">
                <div class="nav-main">
                    <a href="index.php" class="navlink">BLOG</a>
                    <a href="#" class="navlink">AUTOR</a>
                    <a href="#" class="navlink">KONTAKT</a>
                </div>
                <?php 
                    require("login_link.php");
                ?>
            </div>
            <div class="main">
                    <?php
                         $id = $_GET['post_id'];

                         $connection = new mysqli($servername, $username, $password, $dbname);

                         if($connection->connect_errno)
                         {
                             echo 'Błąd połączenia z bazą: ' . $connection->connect_error;
                             exit();
                         }

                         /*
                            Wyciągnięcie wpisu
                         */

                         $post_query = "SELECT tytul, tresc FROM Wpisy WHERE id=" . $id;

                         $result = $connection->query($post_query);

                         if($result->num_rows !== 1)
                         {
                             echo "Wystąpił dziwny błąd";
                             exit();
                         }

 
                        $row = $result->fetch_assoc();

                        $title = $row['tytul'];
                        $content = $row['tresc'];

                         /*
                            Wyciągnięcie komentarzy dla danego wpisu
                         */

                        $comm_query = "SELECT k.data, k.tresc, k.edytowany, u.nazwa FROM Komentarze AS k JOIN Uzytkownicy as u ON k.id_uzytkownika = u.id
                        WHERE k.id_wpisu=" . $id;

                        $result = $connection->query($comm_query);

                        $autor;
                        $data;
                        $edytowany;
                        $tresc;

                        $komentarze = array();

                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $autor = $row['nazwa'];
                                $data = $row['data'];
                                $edytowany = $row['edytowany'];
                                $tresc = $row['tresc'];

                                $komentarz = new Komentarz();
                                $komentarz->autor = $autor;
                                $komentarz->data = $data;
                                $komentarz->edytowany = $edytowany;
                                $komentarz->tresc = $tresc;
                            
                                array_push($komentarze, $komentarz);
                            }
                        }       

                        $wpis = new Wpis();
                        $wpis->id = $id;
                        $wpis->tytul = $title;
                        $wpis->tresc = $content;
                        $wpis->komentarze = $komentarze;
                        $wpis->Wyswietl();
                    ?>
            </div>
            <div class="footer">
                &copy 2020 Rafał Miller
            </div>
        </div>
    </body>
</html>